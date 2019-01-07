import os

# Abort process if there's no config file
if (os.path.isfile('./.setup') == False):
    print('The setup file was not found, aborting mission!')
    exit()

def getEnvironmentVariable(key):
    environment = open('./.setup', 'r')    
    for line in environment:
        if line.split('=')[0] == key:
            environment.close()
            return line.split('=')[1].strip()
    environment.close()

# Gets environment variables
repoName = os.path.basename(os.getcwd()).strip()
packageName = (getEnvironmentVariable('PACKAGE_NAME'), repoName)[getEnvironmentVariable('PACKAGE_NAME') != '']
databaseName = (getEnvironmentVariable('DATABASE_NAME'), packageName)[getEnvironmentVariable('DATABASE_NAME') != '']

environment_data = {
    "APP_NAME": "'" + packageName + "'",
    "APP_URL": 'http://' + packageName.lower().replace(' ', '-').replace('_', '-') + '.loc',
    "DB_DATABASE": databaseName.lower().replace(' ', '').replace('-', '').replace('_', ''),
    "DB_USERNAME": "root",
    "DB_PASSWORD": ""
}

# Downloads Composer dependencies
os.system('composer install && composer dump-autoload')

# Downloads Node dependencies
os.system('npm install')
os.system('npm install cross-env')

# Builds out the environment file
if (os.path.isfile('./.env') == False):
    new_environment = open('./.env', 'a')

    environment = open('./.env.example', 'r')    
    for line in environment:
        if (line.split('=')[0] in environment_data):
            new_environment.write(line.split('=')[0] + "=" + environment_data[line.split('=')[0]] + "\n")
        else:
            new_environment.write(line)

    new_environment.close()
    environment.close()

    os.system('php artisan key:generate')

# Builds out the database
os.system('mysql -u root -e \'CREATE DATABASE IF NOT EXISTS `'+environment_data['DB_DATABASE']+'` CHARACTER SET utf8 COLLATE utf8_general_ci\'')

if (getEnvironmentVariable('SEED_OR_SYNC') == 'SEED'):
    os.system('php artisan migrate:fresh --seed')
else:
    os.system('php artisan migrate')

# Builds out build files
os.system('npm run dev')

# Sets up the url
print('Attempting to open a local url tunnel, please type in your password!')
os.system('sudo valet link ' + packageName.lower().replace(' ', '-').replace('_', '-'))

print('You can now access your site at ' + environment_data['APP_URL'])
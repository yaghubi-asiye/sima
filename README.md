# persia_panel_sima
Panel-Sima of the Persia 


# Setup Database
### Create Config Folder
- create <code>.env</code> file in <code>root</code> project
- put these code in the <code>.env</code> file (for mysql database): 
```laravel
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=DB_NAME
    DB_USERNAME=DB_USER
    DB_PASSWORD=DB_USER_PASS
```

# Run
```bash
# install packages
composer install

# run server
php artisan serve
```
## License
[MIT](https://choosealicense.com/licenses/mit/)

powered by [Persia](https://persiatc.com)

## Generate Email

## Installation Develop & Live Mode
- <b>git clone https://github.com/arditriana01/dev-mail.git</b> <br>
- <b>composer update</b> <br>
- <b>copy .env.example .env</b> <br>
- <b>php artisan key:generate</b> <br>
- Set <b>DB_DATABASE={database_name}</b> on .env
- <b>php artisan migrate</b> <br>

## Important for Every Change
- <b>php artisan config:cache</b>
- <b>php artisan cache:clear </b>
- <b>php artisan view:cache</b>

## Data
- data_mahasiswa_prodi.xlsx

## Support PHP
- version <b>7.* - 8.1</b>

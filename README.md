# d4k

docker-compose up -d

docker-compose logs -f

docker-compose exec drupal composer install

docker-compose exec drupal bash -c 'drush site:install minimal --db-url="mysql://drupal:$DRUPAL_DATABASE_PASSWORD@$DRUPAL_DATABASE_HOST/drupal" --site-name="Drupal Container" --existing-config -y'

docker-compose exec drupal bash -c 'drush config:export -y'

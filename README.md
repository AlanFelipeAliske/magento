# Magento 2.4

1 - Install Composer

2 - Install Java

3 - install Elasticsearch e run and test. 

4 - install Magento (composer create-project --repository-url=https://repo.magento.com/ magento/project-community-edition=2.4 magento / or download Archive (zip/tar)).

5 - Find validateURLScheme function in vendor\magento\framework\Image\Adapter\Gd2.php file. at line 96. Replace function with this:.


### Private function validateURLScheme (string $filename): bool
```
  {
      $allowed_schemes = ['ftp', 'ftps', 'http', 'https'];
      $url = parse_url($filename);
      if ($url && isset($url['scheme']) && !in_array($url['scheme'], $allowed_schemes) && !file_exists($filename)) {
          return false;
      }
      return true;
  }
```
  
6 - Find me function in /vendor/magento/framework/View/Element/Template/File/Validator.php:113. Replace function with this:


### Protected function isPathInDirectories($path, $directories)
```
    {
        $realPath = str_replace('\\', '/', $this->fileDriver->getRealPath($path));
        if (!is_array($directories)) {
            $directories = (array)$directories;
        }
        foreach ($directories as $directory) {
            if (0 === strpos($realPath, $directory)) {
                return true;
            }
        }
        return false;
    }
```

### Command line:

1 - php bin/magento setup:install --base-url="http://localhost/magento" --db-host="localhost" --db-name="magento2" --db-user="root" --db-password="root" --admin-firstname="root" --admin-lastname="root" --admin-email="alanfelipealiske@gmail.com" --admin-user="root" --admin-password="r00tr00t" --use-rewrites="1" --backend-frontname="magento"

2 - php bin/magento indexer:reindex

3 - php bin/magento setup:upgrade

4 - php bin/magento setup:static-content:deploy -f

5 - php bin/magento cache:flush

6 - php bin/magento module:disable Magento_TwoFactorAuth

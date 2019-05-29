## Docker関連

### docker-composeで起動したwordpressサーバーにログインするときのコマンド

```sh
docker-compose run wordpress /bin/bash
```

### php.iniをwordpresのコンテナーにコピーしてアップロードできるファイルサイズを増やす

~~docker cp ./php.ini <コンテナID>:/usr/local/etc/php/conf.d/php.ini~~

https://github.com/docker-library/wordpress/issues/375
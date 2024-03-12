# Install

```
bin/magento setup:install \
--base-url=http://localhost \
--db-host=db \
--db-name=magento \
--db-user=magento \
--db-password=magento \
--backend-frontname=admin \
--admin-firstname=admin \
--admin-lastname=admin \
--admin-email=admin@admin.com \
--admin-user=admin \
--admin-password=admin123 \
--language=en_US \
--currency=RUB \
--timezone=Europe/Samara \
--use-rewrites=1 \
--search-engine=elasticsearch7 \
--elasticsearch-host=elastics \
--session-save=redis \
--session-save-redis-host=redis \
--session-save-redis-db=0 \
--session-save-redis-password='' \
--cache-backend=redis \
--cache-backend-redis-server=redis \
--cache-backend-redis-db=0 \
--page-cache=redis \
--page-cache-redis-server=redis \
--page-cache-redis-db=1 \
--session-save-redis-port=6379 \
--cache-backend-redis-port=6379 \
--page-cache-redis-port=6379 \
--cleanup-database
```

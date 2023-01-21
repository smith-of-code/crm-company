CREATE DATABASE IF NOT EXISTS `crm_company`;
CREATE USER if not exists 'crm_company_user'@'%.%.%.%' IDENTIFIED BY 'LWtds2U6dW';
GRANT ALL PRIVILEGES ON crm_company.* TO 'crm_company_user'@'%.%.%.%';

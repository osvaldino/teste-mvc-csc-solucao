-- Database: `mvc`
CREATE
DATABASE IF NOT EXISTS `teste_csc`
DEFAULT CHARACTER SET utf8
COLLATE utf8_general_ci;

USE
`teste_csc`;

-- Table structure for table `users`
CREATE TABLE `users`
(
    `id`         bigint unsigned NOT NULL AUTO_INCREMENT,
    `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `last_name`  varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email`      varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `phone`      varchar(20) COLLATE utf8mb4_unicode_ci  NOT NULL,
    `cpf`        varchar(14) COLLATE utf8mb4_unicode_ci  NOT NULL,
    `birth_date` date                                    NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `address_type`
CREATE TABLE `address_type`
(
    `id`         bigint unsigned NOT NULL AUTO_INCREMENT,
    `name`       varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Table structure for table `address`
CREATE TABLE `address`
(
    `id`              bigint unsigned NOT NULL AUTO_INCREMENT,
    `zipcode`         varchar(8) COLLATE utf8mb4_unicode_ci  NOT NULL,
    `street`          varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `district`        varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
    `city`            varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
    `state`           varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
    `number`          varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `complement`      text COLLATE utf8mb4_unicode_ci,
    `user_id`         bigint unsigned DEFAULT NULL,
    `address_type_id` bigint unsigned DEFAULT NULL,
    `created_at`      timestamp NULL DEFAULT NULL,
    `updated_at`      timestamp NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY               `address_user_id_foreign` (`user_id`),
    KEY               `address_address_type_id_foreign` (`address_type_id`),
    CONSTRAINT `address_address_type_id_foreign` FOREIGN KEY (`address_type_id`) REFERENCES `address_type` (`id`) ON DELETE CASCADE,
    CONSTRAINT `address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
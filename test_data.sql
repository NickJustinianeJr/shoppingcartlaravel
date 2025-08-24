

INSERT INTO `users` (`id`, `userName`, `password`, `passwordHash`, `created_at`, `updated_at`) VALUES (NULL, 'admin', 'admin', 'admin', NULL, NULL);

INSERT INTO `customers` (`id`, `userId`, `firstName`, `lastName`, `email`, `contactNumber`, `address`, `created_at`, `updated_at`) VALUES (NULL, '1', 'Nick', 'Justiniane Jr', 'nick@gmail.com', '12345', 'Tisa II', NULL, NULL);

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `image`, `price`, `created_at`, `updated_at`) VALUES (NULL, 'Sample', 'This is a sample', '2', 'sampleimage.jpg', '5000', NULL, NULL);
INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `image`, `price`, `created_at`, `updated_at`) VALUES (NULL, 'Sample 2', 'This is a sample 2', '2000', 'sampleimage.jpg', '1000', NULL, NULL);

INSERT INTO `orders` (`id`, `custId`, `orderDate`, `totalAmount`, `created_at`, `updated_at`) VALUES (NULL, '1', '2025-08-24 13:54:18.000000', '20000', NULL, NULL);

INSERT INTO `orderitems` (`id`, `orderId`, `prodId`, `quantity`, `priceAtPurchased`, `created_at`, `updated_at`) VALUES (NULL, '1', '1', '2', '2000', NULL, NULL);

INSERT INTO `shoppingcarts` (`id`, `custId`, `created_at`, `updated_at`) VALUES (NULL, '1', NULL, NULL);

INSERT INTO `cartitems` (`id`, `cartId`, `prodId`, `quantity`, `created_at`, `updated_at`) VALUES (NULL, '1', '1', '4', NULL, NULL);
INSERT INTO `cartitems` (`id`, `cartId`, `prodId`, `quantity`, `created_at`, `updated_at`) VALUES (NULL, '1', '2', '5', NULL, NULL);








## fetch 5 categories for home page
```sql
SELECT * 
FROM category
WHERE home_order > 0 
ORDER BY home_order ASC
```

## fetch 5 product types for footer
```sql
SELECT * 
FROM type
WHERE footer_order > 0 
ORDER BY footer_order ASC
```

## fetch 5 product brands for footer
```sql
SELECT * 
FROM brand
WHERE footer_order > 0 
ORDER BY footer_order ASC
```

## fetch all product of a specific brand 
we need the brand id to do that ! ($brandId = 2)
```sql
SELECT *
FROM product 
WHERE brand_id = 2
ORDER BY created_at DESC
```

## fetch all product of a specific type 
we need the type id to do that ! ($typeId = 2)
```sql
SELECT *
FROM product 
WHERE type_id = 2
ORDER BY created_at DESC
```

## fetch all product of a specific category 
we need the category id to do that ! ($categoryId = 2)
```sql
SELECT *
FROM product 
WHERE category_id = 4
ORDER BY created_at DESC
```

## fetch all product with brand name, category name, type name, based on brand_id (= 2)
```sql
SELECT 
product.*, #toutes les colonnes de la table product
brand.name AS brand_name, # on donne un alias à cette colonne
type.name AS type_name,
category.name AS category_name
FROM product 
JOIN brand ON product.brand_id = brand.id # fait la jointure avec la table brand
JOIN type ON product.type_id = type.id
JOIN category ON product.category_id = category.id
WHERE product.brand_id = 2 #condition !
ORDER BY product.created_at DESC #tri des résultats
```

## fetch one category based on category id (= 3)
```sql
SELECT * 
FROM category 
WHERE id = 3
```
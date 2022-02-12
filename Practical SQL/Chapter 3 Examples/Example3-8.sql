-- filtering with LIKE and ILIKE
-- note: ILIKE is exclusive to PostgreSQL
SELECT first_name 
FROM teachers 
WHERE first_name LIKE 'sam%';

SELECT first_name 
FROM teachers 
WHERE first_name ILIKE 'sam%';
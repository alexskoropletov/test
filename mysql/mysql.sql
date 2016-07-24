SELECT
    CASE WHEN c.Email LIKE "%@mail.ru" THEN 0
        ELSE SUM(p.Price * p.Count)
    END AS order_price,
    CASE WHEN c.Email LIKE "%@mail.ru" THEN 0
        ELSE COUNT(o.Id)
    END AS order_count,
    c.Name
FROM Clients c
LEFT JOIN Orders o ON o.Clients_id = c.Id
LEFT JOIN Products p ON p.Order_id = o.Id
WHERE
p.Id IN (151515,151617,151514)
AND o.Ctime BETWEEN UNIX_TIMESTAMP('2015-03-01') AND UNIX_TIMESTAMP('2015-03-31 23:59:59')
GROUP BY c.Name, order_price, order_count
ORDER BY order_price ASC

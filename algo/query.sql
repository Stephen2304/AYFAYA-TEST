SELECT * FROM Product as p, Order as o, OrderLine as l, 
where NOT EXISTS (SELECT * FROM OrderLine l.OrderLineId = p.id )
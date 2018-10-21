a) What are the names of customers who live in Nathan?

    SELECT name FROM Customers C 
        WHERE C.address LIKE '%Nathan%';

b) What are the names of customers who have bought Fred's Fries?

    SELECT C.name FROM Customers C, Stock S, Orders O
        WHERE S.id = O.ItemId AND C.id = O.CustId
            AND S.name = "Fred's Fries";
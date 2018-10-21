Question 1:

SELECT blogTitle FROM Blog
    WHERE blogTitle LIKE '%Japan%';

Question 2:

SELECT B.blogTitle FROM Blog B, Article A
    WHERE B.blogID = A.blogID
        AND A.headline LIKE '%Japan%';

Question 3:

SELECT B.blogTitle FROM Blog B, Article A
    WHERE B.blogID = A.blogID
        AND B.creator = A.aurthor;
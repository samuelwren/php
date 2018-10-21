
/* Drop these tables else Create them */
drop table if exists post;
drop table if exists comment;

/* Creates Post table */
create table Post (    
    id INTEGER NOT NULL primary key autoincrement,
    title varchar(80) not null,
    userName varchar(80) not null,
    message text default ''
);

/* Creates Comment table */
create table Comment (    
    commentID INTEGER NOT NULL primary key autoincrement,
    postID INTEGER NOT NULL REFERENCES post(id),
    comment_userName varchar(80) not null,
    comment text default ''
);
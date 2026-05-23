CREATE TABLE users
(
    username varchar(100) not null,
    password varchar(100) not null,
    name varchar(100) not null,
    token varchar(100),
    token_expired_at BIGINT,
    primary key (username),
    UNIQUE (token)
) ENGINE InnoDB;

desc users;


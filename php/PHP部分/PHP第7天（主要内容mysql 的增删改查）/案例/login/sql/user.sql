-- 在 itcast 数据库下 创建 user 表

create table user (
    id bigint auto_increment primary key
    , uid varchar( 30 ) 
    , pwd char( 32 )
    , regTime timestamp default CURRENT_TIMESTAMP
    , isDelete tinyint default 0
);


-- 所有的系统都会有一个固定的账户
-- admint
insert into user ( uid, pwd ) values ( "admin", "e10adc3949ba59abbe56e057f20f883e" );


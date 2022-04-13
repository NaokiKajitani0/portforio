create table paiza(
    id int not null auto_increment,
    ranks text not null,
    num int not null,
    scores int not null,
    avescores int not null,
    answertimeH int not null,
    answertimeT int not null,
    answertimeS int not null,
    aveanswertimeH int not null,
    aveanswertimeT int not null,
    aveanswertimeS int not null,
    parameter int not null,
    rankingin text not null,
    ranking int not null,
    CorrentAnswerRate int not null;
    primary key(id)
);

insert into paiza(ranks,num,scores,avescores,answertimeH,answertimeT,answertimeS,aveanswertimeH,aveanswertimeT,aveanswertimeS,parameter,rankingin,ranking) value ('D','3','100','81','0','1','45','0','9','23','26146','Yes','4');

select * from paiza;
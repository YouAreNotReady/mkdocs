#Интерфейсы:

##Ввода данных в таблицу teacher:

![1](./insert.png)

##Удаления данных:
![2](./delete.png)

##Просмотра данных:
![3](./select.png)

#Запросы:

##Query 1

```select * from labor_contract, teacher where teacher_id = 2 and teacher = 2;```

![4](./query_1.png)

##Query 2

```select * from labor_contract where (select extract(month from hire) = 10) and teacher = 3;```

![5](./query_2.png)

##Query 3

```select concat(pupil_id, ' - ', name) as id_name from pupil;```

![6](./query_3.png)


##Query 4

```select * from pupil where pupil_id in (select pupil_id from journal where pupil_id = 1);```

![7](./query_4.png)

##Query 5

``` select * from journal where pupil_id in (select pupil_id from pupil where class_id in (select class_id from class where class_id = 1));```

![8](./query_5.png)
#Структура БД:
![9](./db.png)

#Логи:

##Создание коллекций:
![1](./collections.png)
##teacher:
![2](./teacher_insert.png)
##class:
![3](./class_insert.png)
##timetable:
![3](./timetable_insert.png)

#Запросы:
1) select * from timetable;
![4](./first.png)
;
2)select * from journal where pupil_id in (select pupil_id from pupil where class_id in (select class_id from class where class_id = 1));
![5](./second.png)

3)select sum(amount_of_boys) as boys from class;
![6](./third.png)

4)select sum(amount_of_girls) as girls from class;
![7](./fourth.png)

5)select lesson_number, lesson_time from timetable where lesson_time >= all (select lesson_time from timetable);
![8](./fifth.png)
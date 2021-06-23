# Requests
# Result: 26


## Request 1

Вывести всю информацию из таблиц pupil и teacher совместно.
```
select * from pupil, journal on pupil_id;
```
## Result

pupil_id  | class_id |      name      | gender | average_score | journal_id |    marks    |   subject   | pupil_id
----------|----------|----------------|--------|---------------|------------|-------------|-------------|----------
        1 |        1 | John Cena      | male   |           4.8 |          1 | 5,4,4,5,5,5 | programming |        1
        1 |        1 | John Cena      | male   |           4.8 |          2 | 3,4,5,2,4   | math        |        2
        1 |        1 | John Cena      | male   |           4.8 |          3 | 5,4,5,5,5   | PE          |        4
        1 |        1 | John Cena      | male   |           4.8 |          4 | 4,4,4,4,4,4 | biology     |        3
        2 |        1 | Vasya Pupkin   | male   |           3.3 |          1 | 5,4,4,5,5,5 | programming |        1
        2 |        1 | Vasya Pupkin   | male   |           3.3 |          2 | 3,4,5,2,4   | math        |        2
        2 |        1 | Vasya Pupkin   | male   |           3.3 |          3 | 5,4,5,5,5   | PE          |        4
        2 |        1 | Vasya Pupkin   | male   |           3.3 |          4 | 4,4,4,4,4,4 | biology     |        3
        3 |        3 | Ivan Ivanovich | male   |             4 |          1 | 5,4,4,5,5,5 | programming |        1
        3 |        3 | Ivan Ivanovich | male   |             4 |          2 | 3,4,5,2,4   | math        |        2
        3 |        3 | Ivan Ivanovich | male   |             4 |          3 | 5,4,5,5,5   | PE          |        4
        3 |        3 | Ivan Ivanovich | male   |             4 |          4 | 4,4,4,4,4,4 | biology     |        3
        4 |        4 | Angelina Jolie | female |           4.9 |          1 | 5,4,4,5,5,5 | programming |        1
        4 |        4 | Angelina Jolie | female |           4.9 |          2 | 3,4,5,2,4   | math        |        2
        4 |        4 | Angelina Jolie | female |           4.9 |          3 | 5,4,5,5,5   | PE          |        4
        4 |        4 | Angelina Jolie | female |           4.9 |          4 | 4,4,4,4,4,4 | biology     |        3


### score += 1 (1)

## Request 2

Вывести информацию о трудовом договоре учителя с id = 2 
```
select * from labor_contract, teacher where teacher_id = 2 and teacher = 2;
```
## Result

 labor_contract_id |    hire    | teacher | teacher_id | cabinet
-------------------|------------|---------|------------|---------
                 3 | 2014-09-18 |       2 |          2 |       2
              
### score += 1 (2)

## Request 3

Вывести информацию о трудовом договороре учителя с id = 3 и датой оформления в сентябре
```
select * from labor_contract where (select extract(month from hire) = 10) and teacher = 3;
```
## Result

labor_contract_id |    hire    | teacher
------------------|------------|---------
                 2| 2018-10-15 |       3
              
### score += 2 (4)

## Request 4

Вывести информацию об id и имени ученика
```
select concat(pupil_id, ' - ', name) as id_name from pupil;
```
## Result

id_name            |
-------------------|
1 - John Cena      |
2 - Vasya Pupkin   |
3 - Ivan Ivanovich |
4 - Angelina Jolie |
              
### score += 2 (6)

## Request 5

Вывести информацию об ученике с id 1
```
 select * from pupil where pupil_id in (select pupil_id from journal where pupil_id = 1);
```
## Result

pupil_id  | class_id |   name    | gender | average_score
----------|----------|-----------|--------|---------------
        1 |        1 | John Cena | male   |           4.8
              
### score += 2 (8)

## Request 6

Вывести информацию об учениках из класса с id = 1
```
 select * from journal where pupil_id in (select pupil_id from pupil where class_id in (select class_id from class where class_id = 1));
```
## Result

 journal_id |    marks    |   subject   | pupil_id
------------|-------------|-------------|----------
          1 | 5,4,4,5,5,5 | programming |        1
          2 | 3,4,5,2,4   | math        |        2
              
### score += 2 (10)

## Request 7

Вывести информацию о количестве девочек и мальчиков из всех классов

```
 select sum(amount_of_boys) as boys, sum(amount_of_girls) as girls from class;
```
## Result

boys | girls
-----|-------
   44|    35
              
### score += 2 (12)

## Request 8

Вывести информацию о классах в которых количество девочек меньше 9
```
 select class_id, sum(amount_of_girls) as girls from class group by class_id having sum(amount_of_girls) < 9 order by class_id;
```
## Result

class_id | girls
---------|-------
        1|     8
        4|     3
              
### score += 2 (14)

## Request 9

Вывести информацию об учениках, хотя бы одна запись о которых присутствует в журнале
```
select distinct * from pupil where exists (select pupil_id from journal);
```
## Result

pupil_id | class_id |      name      | gender | average_score
---------|----------|----------------|--------|---------------
        2|        1 | Vasya Pupkin   | male   |           3.3
        3|        3 | Ivan Ivanovich | male   |             4
        4|        4 | Angelina Jolie | female |           4.9
        1|        1 | John Cena      | male   |           4.8
              
### score += 2 (16)

## Request 10

Вывести информацию о последнем по времени предмете
```
select lesson_number, lesson_time from timetable where lesson_time >= all (select lesson_time from timetable);
```
## Result

lesson_number | lesson_time
--------------|-------------
             3| 10:10:00
              
### score += 2 (18)

## Request 11

Вывести информацию об учениках мужского пола

```
select distinct * from pupil pupil_id where not pupil_id = some (select pupil_id from pupil where gender = 'female');
```
## Result

pupil_id | class_id |      name      | gender | average_score
---------|----------|----------------|--------|----------------
        2|        1 | Vasya Pupkin   | male   |           3.3
        3|        3 | Ivan Ivanovich | male   |             4
        1|        1 | John Cena      | male   |           4.8
              
### score += 2 (20)

## Request 12

Вывести информацию о трудовом договоре учителя с id = 1 и датой заключения 2020-06-22
```
select * from labor_contract where teacher = 1 intersect select * from labor_contract where hire = '2020-06-22';
```
## Result

labor_contract_id |    hire    | teacher
------------------|------------|---------
                 1| 2020-06-22 |       1
              
### score += 2 (22)

## Request 13

Вывести объединенную информацию об учителях и рабочих договорах
```
select teacher_id from teacher union all select * from labor_contract;
```
## Result

teacher_id |
-----------|
          1|
          2|
          3|
          4|
          1|
          2|
          3|
          4|
              
### score += 2 (24)

## Request 14

Вывести объединенную информацию о учениках и их оценках
```
select * from pupil left join journal on pupil.pupil_id = journal.pupil_id;
```
## Result

pupil_id | class_id |      name      | gender | average_score | journal_id |    marks    |   subject   | pupil_id
---------|----------|----------------|--------|---------------|------------|-------------|-------------|----------
        1|        1 | John Cena      | male   |           4.8 |          1 | 5,4,4,5,5,5 | programming |        1
        2|        1 | Vasya Pupkin   | male   |           3.3 |          2 | 3,4,5,2,4   | math        |        2
        4|        4 | Angelina Jolie | female |           4.9 |          3 | 5,4,5,5,5   | PE          |        4
        3|        3 | Ivan Ivanovich | male   |             4 |          4 | 4,4,4,4,4,4 | biology     |        3
              
### score += 2 (26)

## Название СУБД:
Школа

## Версия СУБД:

POSTGRE version `13.3`

## Код создания БД:

`CREATE DATABASE school;`

## Создание таблиц:

## 1.teacher

| name           | type           | primary key    | unique  | not null | references          |
|:---------------|:---------------|:---------------|:--------|:---------|:--------------------|
| teacher_id     |`int`           |`true`          |`true`   | `true`   | `null`              |
| cabinet        |`int`           |`false`         |`false`  | `false`  | `null`              |

**Creation**

```
create table teacher(
	teacher_id int primary key,
	cabinet int
);
```

**Insert**

```
insert into teacher values (
	1,
	1
);
```

## 2.labor_contract

| name              | type           | primary key    | unique  | not null | references          |
|:------------------|:---------------|:---------------|:--------|:---------|:--------------------|
| labor_contract_id | `int`          | `true`         |`true`   | `true`   | `null`              |
| hire              | `date`         | `false`        |`false`  | `false`  | `null`              |
| teacher           | `int`          | `false`        |`false`  | `false`  | `teacher.teacher_id`|


**Creation**

```
create table labor_contract (
	labor_contract_id int primary key,
	hire date,
	teacher int,
	foreign key (teacher) references teacher (teacher_id)
);
```

**Insert**

```
insert into labor_contract values (
	1,
	'22.06.2020',
	1
);
```

## 3.class

| name             | type           | primary key    | unique  | not null | references          |
|:-----------------|:-----------    |:-------------- |:--------|:---------|:------------------- |
| class_id         | `int`          | `true`         |`true`   | `true`   | `null`              |
| amount_of_girls  | `int`          | `false`        |`false`  | `false`  | `null`              |
| amount_of_boys   | `int`          | `false`        |`false`  | `false`  | `null`              |
| classroom_teacher| `varchar(30)`  | `false`        |`false`  | `false`  | `null`              |

**Creation**

```
create table class (
	class_id int primary key,
	amount_of_girls int,
	amount_of_boys int,
	classroom_teacher varchar(30)
);
```

**Insert**

```
insert into class values (
	1,
	8,
	12,
	'Jason Statham'
);
```

## 4.timetable

| name           | type           | primary key    | unique  | not null | references          |
|:---------------|:---------------|:---------------|:--------|:---------|:--------------------|
| timetable_id   | `int`          | `true`         |`true`   | `true`   | `null`              |
| teacher_id     | `int`          | `false`        |`false`  | `false`  | `teacher.teacher_id`|
| class_id       | `int`          | `false`        |`false`  | `false`  | `class.class_id`    |
| lesson_number  | `int`          | `false`        |`false`  | `false`  | `null`              |
| lesson_time    | `time`         | `false`        |`false`  | `false`  | `null`              |
| subject        | `varchar(20)`  | `false`        |`false`  | `false`  | `null`              |


**Creation**

```
create table timetable (
	timetable_id int primary key,
	teacher_id int,
	class_id int,
	lesson_number int,
	lesson_time time,
	subject varchar(20),
	foreign key (teacher_id) references teacher (teacher_id),
	foreign key (class_id) references class (class_id)
);
```

**Insert**

```
insert into timetable values (
	1,
	1,
	1,
	1,
	'8:30:00',
	'programming'
);
```

## 5.pupil

| name           | type           | primary key    | unique  | not null | references          |
|:---------------|:---------------|:---------------|:--------|:---------|:------------------- |
| pupil_id       | `int`          | `true`         | `true`  | `true`   | `null`              |
| class_id       | `int`          | `false`        | `false` | `false`  | `class.class_id`    |
| name           | `varchar(30)`  | `false`        | `false` | `false`  | `null`              |
| gender		 | `varchar(10)`  | `false`        | `false` | `false`  | `null`              |
| average_score  | `real`         | `false`        | `false` | `false`  | `null`              |

**Creation**

```
create table pupil (
	pupil_id int primary key,
	class_id int,
	name varchar(30),
	gender varchar(10),
	average_score real,
	foreign key (class_id) references class (class_id)
);
```

**Insert**

```
insert into pupil values (
	1,
	1,
	'John Cena',
	'male',
	4.8
);
```

## 6.journal

| name           | type           | primary key    | unique  | not null | references                |
|:-------------- |:-----------    |:-------------- |:--------|:---------|:--------------------------|
| journal_id     | `int`          | `true`         |`true`   | `true`   | `null`                    |
| marks          | `varchar(30)`  | `false`        |`false`  | `false`  | `null`                    |
| subject        | `varchar(20)`  | `false`        |`false`  | `false`  | `null`                    |
| pupil_id       | `int`          | `false`        |`false`  | `false`  | `pupil.pupil_id`          |

**Creation**

```
create table journal (
	journal_id int primary key,
	marks varchar(30),
	subject varchar(20),
	pupil_id int,
	foreign key (pupil_id) references pupil (pupil_id)
);
```

**Insert**

```
insert into journal values (
	1,
	'5,4,4,5,5,5',
	'programming',
	1
);
```

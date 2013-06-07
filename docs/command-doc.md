command-doc

#运维命令
所有网站维护需要使用的命令都放在protected/commands目录下，调用方式：
```
cd protected
./yiic commandFileName commandName --param1=xxoo --param2=xxoo
```

如protected/commands目录下有文件FetchCourseDataCommand.php，该文件中有一个名叫FetchCourseDataCommand的类,继承yii中的CConsoleCommand类.
该类中所有可以调用的命令都要命名为形如下方所示的函数
```
public function action<CommandName>($<param1>,$<param2>,...){...}
```
这样,当我们在protected目录下运行
```
./yiic fetchCourseData commandName --param1=xx --param2=oo
```
FetchCourseDataCommand类下的actionCommandName函数就被调用,并且函数的名为$param1的参数被设为xx,名为$param2的参数被设为oo

另外注意,运行yii命令时所使用的配置文件为protected/config/console.php

##FetchCourseData
该命令类用来从教务网获取数据填充到数据库中

###actionGetDepartmentAndMajorInfo
是FetchCourseDataCommand中的可运行命令,通过在protected目录下运行
```
./yiic fetchCourseData getDepartmentAndMajorInfo --username=教务网本科学生用户名 --password=教务网本科学生密码
```
该命令先到教务网http://desktop.nju.edu.cn:8080/jiaowu/student/teachinginfo/allCourseList.do?method=getTermAcademy页面中获取所有院系信息
然后对于每个department(院系)和major(专业),如果department和major表中有对应的记录,则不做操作,如果department或者major的名字有更改,则更新表.如果有新的department或者major,则插入新记录

命令运行后,输出信息中会显示哪些记录被更新,哪些记录被添加

该命令的所有操作在同一个事务中,如果命令执行中途出错,整个事务会回滚,避免了数据的污染

###actionGetCourseRawData
是FetchCourseDataCommand中的可运行命令,通过在protected目录下运行
./yiic fetchCourseData getCourseRawData --username=教务网本科学生用户名 --password=教务网本科学生密码 --terms=20121,20122 --grades=2012,2011,2010,2009

其中terms表示需要获取课程数据的学期编号,是一个五位数字,前四位表示学期的年份,第五位表示第一学期还是第二学期.如2012年九月到2013年六月的学期编号为20121
grades表示需要获取课程数据的年级编号,是一个四位数字,2012表示获取2012届的课程信息

该命令
1. 清除jw_data表中的所有数据
2. 获取major表中每个专业在所给年级和学期下的所有课程,并把数据插入jw_data中

在终端中,没显示一个"+"符号表示新插入了一条课程记录

该命令的所有操作在同一个事务中,如果命令执行中途出错,整个事务会回滚,避免了数据的污染

###actionExtractCourseRawData
是FetchCourseDataCommand中的可运行命令,通过在protected目录下运行
```
./yiic fetchCourseData extractCourseRawData
```

该命令
1. 找出jw_data中所有course_id和course_name,到course表中查找course_id对应的课程,如果没找到,则插入作为新课程;如果找到并且课程名有改变,则更新课程记录
2. 遍历jw_data中的每一条课程记录,如果在class表中通过course_id,term,grade,major_id没有找到相应的class记录,则根据这条jw_data数据插入class记录
2.1 找到jw_data该记录中的教师信息,如果不存在该教师,则插入
2.2 插入该class和上课教师的teaching对应关系
2.3 插入该class的上课时间地点数据

该命令的所有操作在同一个事务中,如果命令执行中途出错,整个事务会回滚,避免了数据的污染

## File Formatter

Small Project to convert input csv file to xml/json format via command line

### description

This project is created as a part of coding test .Laravel console command is used in this project.
user would be given a choice to select file format.On selecting specified file would be converted to that format and
stored in project/storage/app folder

### Dependencies

Laravel 8.54
PHP 7.3

### Installing

1 Clone GitHub repo for this project locally
`https://github.com/riyazpt/file-formatter.git`
2 change directory to project folder
3 Install Composer Dependencies
composer install

### Executing program

1 on command line of project type 'php artisan serve'
The application would be run and up at http://127.0.0.1:8000
2 Go to project folder and type
php artisan file:convert folderpath\riyas.csv
here csv file path should be specified
3 It would be prompting as follows
Please type 0 or 1 to convert file:
[0] Json
[1] Xml

4 User selects the one of the option.Based on the option selected csv file would be converted to corresponding format.
Note:if folder is not created on storage then
type php artisan optimize:clear i command line
and close the folder and reopen it and repeat step 1 to 4.

### API Specification

The main endpoint of this project is http://127.0.0.1:8000/api/v1/file/search
we can filter values by pvp,name which is stored in json file.
GET http://127.0.0.1:8000/api/v1/file/search

```
Sample Payload
{
"pvp": "asd",
"name": "riyas"
}
```

###Sample Output

```
<?xml version="1.0" encoding="UTF-8"?>
<root>
    <id>1</id>
    <name>asd</name>
    <sku>sd</sku>
    <pvp>sad</pvp>
    <discount>20</discount>
    <id>2</id>
    <name>asd</name>
    <sku>sd</sku>
    <pvp>sad</pvp>
    <discount>30</discount>
</root>
```

### Test

Unit test can be performed by typing following command on project terminal
.\vendor\bin\phpunit

### Future enhancement

1 Filter API integration with front-end
2 Shifting the project to Docker container

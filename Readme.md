### Config File Manager
> this class written 5 years ago . it's better to not use regular expressions for performance and faster interpreting . this project is just for ... !
you may have file like this in your projects  

**#config.ini**

 >Title=My App  
 >TemplateDirectory=temp dir  
 
 
start with create new instance of **ConfigFileManager**
```php
    $config = new ConfigFileManager('configs/config.ini');  //opening file config.ini from configs directory  
         
    echo $config->Title;  //read  "Title" value which is equal to  "My App"  
       
    $config->Title = "Your App";  //changing value of "Title"  
      
    $config->save();  //save changes to config.ini easily
```
### installation
---
`composer require ghalambaz/config-file-manager `

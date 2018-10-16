### Config File Manager
you may have file like this in you projects  
> **#config.ini**
 >Title=My App  
 >TemplateDirectory=temp dir  
 
 
start with create new instance of **ConfigFileManager**

    $config = new ConfigFileManager('configs/config.ini');  //opening file config.ini from configs directory  
         
    echo $config->Title;  //read  "Title" value which is equal to  "My App"  
       
    $config->Title = "Your App";  //changing value of "Title"  
      
    $config->save();  //save changes to config.ini easily

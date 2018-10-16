﻿<?php
/**
 * Developer: ali ghalambaz<a.ghalambaz@gmail.com>
 * Date: 12/19/12
 * Time: 4:45 PM
 *//*
 *
//file name : config.ini
//file content :

# sample config file comment
# My application's configuration file
Title=My App
TemplateDirectory=temp dir


//How To Use
 $config = new ConfigFileManager('com/mvc/configs/config.ini');
 echo $config->Title;
 $config->Title = Your App;
 $config->save();
*/
namespace ConfigFileManager;

class ConfigFileManager
{
    private $configFile = null;
    private $items = array();
    function __construct($file_address)
    {
        if(file_exists($file_address))
        {
            $this->configFile = $file_address;
            $this->parse();
        }
    }
    function __get($id) { return $this->items[ $id ]; }
    function __set($id,$v) { $this->items[ $id ] = $v; }
    function parse()
    {
        if($this->configFile != null)
        {
            $fh = fopen( $this->configFile, 'r' );
            while( $l = fgets( $fh ) )
            {
             if ( preg_match( '/^#/', $l ) == false )
             {
                preg_match( '/^(.*?)=(.*?)$/', $l, $found );
                if($found)
                $this->items[ trim($found[1]) ] = trim($found[2]);
             }
            }
            fclose( $fh );
        }
        else
        {
          $this->file_not_exist();
        }
    }
    function save()
    {
        if($this->configFile != null)
        {
            $nf = '';
            $fh = fopen( $this->configFile, 'r' );
            while( $l = fgets( $fh ) )
            {
                if ( preg_match( '/^#/', $l ) == false )
                {
                    preg_match( '/^(.*?)=(.*?)$/', $l, $found );
                    $nf .= $found[1]."=".$this->items[$found[1]]."\n";
                }
                else
                {
                    $nf .= $l;
                }
            }
            fclose( $fh );
            copy( $this->configFile, $this->configFile.'.bak' );  //backup last configs
            $fh = fopen( $this->configFile, 'w' );
            fwrite( $fh, $nf );
            fclose( $fh );
        }
        else
        {
            $this->file_not_exist();
        }
    }
    private function file_not_exist()
    {
       //throw exception that you want
        echo "File Does Not Exist";
    }
}
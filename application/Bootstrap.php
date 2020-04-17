<?php
use Yaf\Bootstrap_Abstract;
use Yaf\Loader;
use Yaf\Application;
use Yaf\Registry;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Bootstrap extends Bootstrap_Abstract {

    private $config;

    public function _initConfig() {
        $this->config = Application::app()->getConfig();
        Registry::set('config', $this->config);
    }

    public function _initPlugin() {
        var_dump(__METHOD__);
    }



    /**
     * 加载vendor下的文件
     */
    public function _initLoader()
    {
        Loader::import(APPLICATION_PATH . '/vendor/autoload.php');
    }

    /**
     * 初始化数据库分发器
     * @function _initDefaultDbAdapter
     * @author   jsyzchenchen@gmail.com
     */
    public function _initDefaultDbAdapter()
    {
        //初始化 illuminate/database
        $capsule = new Manager;
        $capsule->addConnection($this->config->database->toArray());
        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        //开启Eloquent ORM
        $capsule->bootEloquent();

        class_alias('\Illuminate\Database\Capsule\Manager', 'DB');
    }
}
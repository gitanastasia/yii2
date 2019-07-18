<?php


namespace app\components;



use app\rules\OwnerActivityRule;
use yii\base\Component;
use yii\rbac\ManagerInterface;

class RbacComponent extends Component
{
    //возвращаем метод getAuthManager() из сервис локатора
    private function getAuthManager():ManagerInterface{
        return \Yii::$app->authManager;
    }
    //функцияя для генерации правил
    public function gen(){
        $authManager=$this->getAuthManager();

        //удалает все предыдущие парвила
        $authManager->removeAll();

        //создаем роли
        $admin= $authManager->createRole('admin');
        $user= $authManager->createRole('user');

        //передаем роли в бд
        $authManager->add($admin);
        $authManager->add($user);

        //создаем permissions
        $createActivity=$authManager->createPermission('createActivity');
        $createActivity->description='Создание события';

        $authManager->add($createActivity);

        $viewEditOwnerActivity=$authManager->createPermission('viewEditOwnerActivity');
        $viewEditOwnerActivity->description="Просмотр и редактирование события";

        //приклепляем павило OwnerActivityRule
        $rule=new OwnerActivityRule();
        //добавляем экземпляр класса в бд
        $authManager->add($rule);

        $viewEditOwnerActivity->ruleName=$rule->name;
        $authManager->add($viewEditOwnerActivity);

        $allPrivilege= $authManager->createPermission('allPrivilege');
        $allPrivilege->description="Полные права";

        $authManager->add($allPrivilege);

        //связываем роли и разрешения
        $authManager->addChild($user,$createActivity);
        $authManager->addChild($user,$viewEditOwnerActivity);

        //admin может то, что и user
        $authManager->addChild($admin,$user);
        $authManager->addChild($admin,$allPrivilege);

        $authManager->assign($admin, 6);
        $authManager->assign($user,7);

        $authManager->assign($admin, 1);
        $authManager->assign($user,2);
    }

    public function addToUserRole($user_id){
        $role=$this->getAuthManager()->getRole('user');
        $this->getAuthManager()->assign($role,$user_id);
    }

// присвоение прав на  coздание события
    public function canCreateActivity():bool{
        return \Yii::$app->user->can('createActivity');
    }

    public function canViewOrEditActivity($activity):bool{

        if(\Yii::$app->user->can('allPrivilege')){
            return true;
        }
        return \Yii::$app->user->can('viewEditOwnerActivity',[
            'activity'=>$activity
        ]);

    }

}
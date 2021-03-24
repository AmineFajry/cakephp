<?php

namespace App\Controller;


use Cake\Utility\Text;

class PicturesController extends AppController
{

    public function listing()
    {

        //http://cakephp.test/api/images

        $name = $this->getRequest()->getQuery('name');
        $limit = $this->getRequest()->getQuery('limit');
        $tabPicture = $this->Pictures->find()->all();

        if($limit >= 0 && $limit != 0)
            $tabPicture = $this->Pictures
                                ->find()
                                ->limit($limit);

        $tabPicture = $this->Pictures
                            ->find()
                            ->where(['name LIKE' => '%' . $name . '%'])
                            ->limit($limit);

        return $this->response->withStringBody(json_encode($tabPicture))
                               ->withType('application/json');


    }

    public function index()
    {

        $tabpicture = $this->Pictures->
        find('all',array(
            'fields'=> array('Pictures.id',
                            'Pictures.description',
                            'Pictures.name',
                            'Pictures.height',
                            'Pictures.width',
                            'Pictures.created'
                           )
        ))->toArray();

        //$commentsTab = $this->Pictures->get(0, ['contain' => ['comments']])->toArray()['comments'];

        //dd($commentsTab);


        $this->set(compact('tabpicture'));

    }

    public function add($id = null )
    {


        $pictureEntity = $this->Pictures->newEmptyEntity();

        //http://cakephp.test/pictures/add


        if ($this->request->is('Post')) {
            $fileobject = $this->request->getData('uploadfile');
            $uploadPath = WWW_ROOT ."img/jpg/";
            $destination = $uploadPath . Text::slug($this->request->getData('name')).'.jpg';

            if(file_exists($destination) || empty($this->getRequest()->getData()) )
            {
                $this->Flash->error('Une erreur est survenue !');
            }else{
                $fileobject->moveTo($destination);//deplacer

                if(!empty($this->getRequest()->getData()))
                {
                    $this->Pictures->patchEntity($pictureEntity,$this->getRequest()->getData());

                    if($this->Pictures->save($pictureEntity))
                    {
                        $this->Flash->success('Bravo ! Votre Image a été ajouté');
                    }
                    return $this->redirect($this->referer());
                }
            }


        }

        $this->set(compact('pictureEntity'));

    }

    /*public function delete($id = null )
    {

        // Pour delete
        if(!$id)
        {
            $picturetoDelete = $this->Pictures->newEmptyEntity();
        }else{
            //Sinon supprime l'image
            $picturetoDelete = $this->Pictures->get($id);

            $this->Pictures->delete($picturetoDelete);

        }

        $this->set(compact('picturetoDelete'));

    }*/

}



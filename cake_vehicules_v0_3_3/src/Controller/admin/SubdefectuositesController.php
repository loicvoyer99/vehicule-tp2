<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Subdefectuosites Controller
 *
 * @property \App\Model\Table\SubdefectuositesTable $Subdefectuosites
 *
 * @method \App\Model\Entity\Subdefectuosite[] paginate($object = null, array $settings = [])
 */
class SubdefectuositesController extends AppController {

    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 150,
        /*        'fields' => [
          'id', 'name', 'description'
          ],
         */ 'sortWhitelist' => [
            'id', 'name', 'description'
        ]
    ];

    public function initialize() {
        parent::initialize();
        // Use the Bootstrap layout from the plugin.
        // $this->viewBuilder()->setLayout('admin');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index() {
        $subdefectuosites = $this->paginate($this->Subdefectuosites);

        $this->set(compact('subdefectuosites'));
        $this->set('_serialize', ['subdefectuosites']);
    }

    /**
     * View method
     *
     * @param string|null $id Subdefectuosite id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $subdefectuosite = $this->Subdefectuosites->get($id, [
            'contain' => []
        ]);

        $this->set('subdefectuosite', $subdefectuosite);
        $this->set('_serialize', ['subdefectuosite']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $subdefectuosite = $this->Subdefectuosites->newEntity();
        if ($this->request->is('post')) {
            $subdefectuosite = $this->Subdefectuosites->patchEntity($subdefectuosite, $this->request->getData());
            if ($this->Subdefectuosites->save($subdefectuosite)) {
                $this->Flash->success(__('The subdefectuosite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subdefectuosite could not be saved. Please, try again.'));
        }
        $this->set(compact('subdefectuosite'));
        $this->set('_serialize', ['subdefectuosite']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subdefectuosite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $subdefectuosite = $this->Subdefectuosites->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subdefectuosite = $this->Subdefectuosites->patchEntity($subdefectuosite, $this->request->getData());
            if ($this->Subdefectuosites->save($subdefectuosite)) {
                $this->Flash->success(__('The subdefectuosite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subdefectuosite could not be saved. Please, try again.'));
        }
        $this->set(compact('subdefectuosite'));
        $this->set('_serialize', ['subdefectuosite']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Subdefectuosite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $subdefectuosite = $this->Subdefectuosites->get($id);
        if ($this->Subdefectuosites->delete($subdefectuosite)) {
            $this->Flash->success(__('The subdefectuosite has been deleted.'));
        } else {
            $this->Flash->error(__('The subdefectuosite could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}

<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Subdefectuosites Controller
 *
 * @property \App\Model\Table\SubdefectuositesTable $Subdefectuosites
 *
 * @method \App\Model\Entity\Subdefectuosite[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SubdefectuositesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Defectuosites']
        ];
        $subdefectuosites = $this->paginate($this->Subdefectuosites);

        $this->set(compact('subdefectuosites'));
    }

    public function getByDefectuosite() {
        $defectuosite_id = $this->request->query('defectuosite_id');

        $subdefectuosites = $this->Subdefectuosites->find('all', [
            'conditions' => ['Subdefectuosites.defectuosite_id' => $defectuosite_id],
        ]);
        $this->set('subdefectuosites', $subdefectuosites);
        $this->set('_serialize', ['subdefectuosites']);
    }

    /**
     * View method
     *
     * @param string|null $id Subdefectuosite id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subdefectuosite = $this->Subdefectuosites->get($id, [
            'contain' => ['Defectuosites']
        ]);

        $this->set('subdefectuosite', $subdefectuosite);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subdefectuosite = $this->Subdefectuosites->newEntity();
        if ($this->request->is('post')) {
            $subdefectuosite = $this->Subdefectuosites->patchEntity($subdefectuosite, $this->request->getData());
            if ($this->Subdefectuosites->save($subdefectuosite)) {
                $this->Flash->success(__('The subdefectuosite has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subdefectuosite could not be saved. Please, try again.'));
        }
        $defectuosites = $this->Subdefectuosites->Defectuosites->find('list', ['limit' => 200]);
        $this->set(compact('subdefectuosite', 'defectuosites'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Subdefectuosite id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
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
        $defectuosites = $this->Subdefectuosites->Defectuosites->find('list', ['limit' => 200]);
        $this->set(compact('subdefectuosite', 'defectuosites'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Subdefectuosite id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
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

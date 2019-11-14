<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * APropos Controller
 *
 *
 * @method \App\Model\Entity\APropo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AProposController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        
        //$aPropos = $this->paginate($this->APropos);

        $this->set(compact('aPropos'));
    }

    /**
     * View method
     *
     * @param string|null $id A Propo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aPropo = $this->APropos->get($id, [
            'contain' => []
        ]);

        $this->set('aPropo', $aPropo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $aPropo = $this->APropos->newEntity();
        if ($this->request->is('post')) {
            $aPropo = $this->APropos->patchEntity($aPropo, $this->request->getData());
            if ($this->APropos->save($aPropo)) {
                $this->Flash->success(__('The a propo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The a propo could not be saved. Please, try again.'));
        }
        $this->set(compact('aPropo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id A Propo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aPropo = $this->APropos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aPropo = $this->APropos->patchEntity($aPropo, $this->request->getData());
            if ($this->APropos->save($aPropo)) {
                $this->Flash->success(__('The a propo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The a propo could not be saved. Please, try again.'));
        }
        $this->set(compact('aPropo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id A Propo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aPropo = $this->APropos->get($id);
        if ($this->APropos->delete($aPropo)) {
            $this->Flash->success(__('The a propo has been deleted.'));
        } else {
            $this->Flash->error(__('The a propo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

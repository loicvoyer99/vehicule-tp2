<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;

/**
 * Vehicules Controller
 *
 * @property \App\Model\Table\VehiculesTable $Vehicules
 *
 * @method \App\Model\Entity\Vehicule[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VehiculesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['autocompletedemo', 'findCars', 'add', 'edit', 'delete']);
        
        
    }
    
    
    
    
    public function findCars() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Vehicules->find('all', array(
                'conditions' => array('Vehicules.marque LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['marque'], 'value' => $result['marque']);
            }
            echo json_encode($resultArr);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $vehicules = $this->paginate($this->Vehicules);

        $this->set(compact('vehicules'));
        $this->set('_serialize', ['vehicules']);


        
    }

    /**
     * View method
     *
     * @param string|null $id Vehicule id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null) {




        $vehicule = $this->Vehicules
                ->findBySlug($slug)
                ->contain('Defectuosites')
                ->contain('Users')
                ->contain('Files')
                ->firstOrFail();




        $this->set('vehicule', $vehicule);
        $this->set('_serialize', ['vehicules']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $vehicule = $this->Vehicules->newEntity();
        if ($this->request->is('post')) {
            $vehicule = $this->Vehicules->patchEntity($vehicule, $this->request->getData());

            // Changé : On force le user_id à celui de la session
            $vehicule->user_id = $this->Auth->user('id');

            if ($this->Vehicules->save($vehicule)) {
                $this->Flash->success(__('Votre vehicule a été sauvegardé.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible d\'ajouter votre vehicule.'));
        }
        $this->set('vehicule', $vehicule);
        $this->set('_serialize', ['vehicules']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($slug) {
        $vehicule = $this->Vehicules
                ->findBySlug($slug)
                //->contain('Tags') // Charge les tags associés
                ->firstOrFail();
        $user = $this->Auth->identify();

        if ($this->request->is(['post', 'put'])) {
            $this->Vehicules->patchEntity($vehicule, $this->request->getData(), [
                // Ajouté : Empêche la modification du user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Vehicules->save($vehicule)) {
                $this->Flash->success(__('Votre vehicule a été modifié.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Impossible de mettre à jour le vehicule.'));
        }
        $this->set('vehicule', $vehicule);
        $this->set('_serialize', ['vehicules']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $vehicule = $this->Vehicules->get($id);
        if ($this->Vehicules->delete($vehicule)) {
            $this->Flash->success(__('The vehicule has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

// Ajouter ce 'use' juste sous la déclaration du namespace pour importer
// la classe Query


    public function tags() {
        // La clé 'pass' est fournie par CakePHP et contient tous les
        // segments d'URL passés dans la requête
        $tags = $this->request->getParam('pass');

        // Utilisation de VehiculesTable pour trouver les articles taggés
        $vehicules = $this->Vehicules->find('tagged', [
            'tags' => $tags
        ]);

        // Passage des variable dans le contexte de la view du template
        $this->set([
            'vehicules' => $vehicules,
            'tags' => $tags
        ]);
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        // Les actions 'add' et 'tags' sont toujours autorisés pour les utilisateur
        // authentifiés sur l'application
        if (in_array($action, ['add', 'tags'])) {
            return true;
        }

        // Toutes les autres actions nécessitent un slug
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

        // On vérifie que le vehicule appartient à l'utilisateur connecté
        $vehicule = $this->Vehicule->findBySlug($slug)->first();

        return $vehicule->user_id === $user['id'];
    }

}

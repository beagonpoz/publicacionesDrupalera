<?php

/*
*-------------------------------------------------------------------------------
* Habilitar la configuración de propiedades del nodo en view modes en Drupal 8.
*-------------------------------------------------------------------------------
*
* El objetivo del snippet es habilitar la configuración vía interfaz de algunas
* propiedades de los nodos en los diferentes modos de visualización (view modes)
* de los tipos de contenido, tarea que por defecto no podremos realizar.
* Esto nos permitirá, entre otras cosas, modificar su posición dentro del
* contenido a mostrar o aplicar un formatter diferente.
*
* En este caso, el snippet descrito a continuación, habilitará el campo
* fecha de creación (created) para su configuración en diferentes view modes.
*/

/**
* Implements hook_entity_base_field_info_alter().
*/
function my_module_entity_base_field_info_alter(&$fields, \Drupal\Core\Entity\EntityTypeInterface $entity_type) {
  // Make created field configurable on view modes.
  if ($entity_type->id() == 'node' && !empty($fields['created'])) {
    // This is the important part here.
    $fields['created']->setDisplayConfigurable('view', TRUE);
  }
}

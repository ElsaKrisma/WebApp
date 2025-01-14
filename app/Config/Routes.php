<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ToDoList::index');
$routes->match(['get', 'post'], 'signin', 'ToDoList::signin');
$routes->match(['get', 'post'], 'signup', 'ToDoList::signup');
$routes->get('logout', 'ToDoList::logout');
$routes->match(['get', 'post'], 'profile', 'ToDoList::profile');
$routes->match(['get', 'post'], 'create-task', 'ToDoList::createTask');
$routes->match(['get', 'post'], 'edit-task/(:num)', 'ToDoList::editTask/$1');
$routes->get('delete-task/(:num)', 'ToDoList::deleteTask/$1');
$routes->get('search', 'ToDoList::search');


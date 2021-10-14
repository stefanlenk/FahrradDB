<?php

namespace Application\View\Html;

use Application\Model\Input\Name;
use Application\Model\Input\Task;
use Application\View\Html;

abstract class Page extends Html
{
    public function render()
    {
        $this -> html =
            '<!DOCTYPE html>
			<html lang="de">
			  <head>
				<meta charset="utf-8" />
				<meta name="viewport" content="width=device-width, initial-scale=1.0" />
				<title>Stefans | ' . $this -> htmlPageTitle () . '</title>
				<link rel="icon" type="image/x-icon" href="bike-hell.png">
				<link rel="stylesheet" href="stylesheet.css">
			  </head>
			  <nav>
			    <ul>
			        <li>' . $this -> htmlAktionHome () . '</li>
			        <li>' . $this -> htmlAktionJahre () . '</li>
			        <li>' . $this -> htmlAktionListe () . '</li>
			        <li>' . $this -> htmlAktionSuche () . '</li>
                </ul>
              </nav>
			  ' . $this -> htmlBody () . '			  
			</html>';
    }

    /**
     * @return string
     */
    abstract protected function htmlPageTitle();

    protected function htmlAktionHome(): string
    {
        $query = http_build_query ( array(
            Name::Task => Task::Home
        ) );

        $result = '<a href="/?' . $query . '">Übersicht Räder</a>';
        return $result;
    }

    protected function htmlAktionJahre(): string
    {
        $query = http_build_query ( array(
            Name::Task => Task::Jahre
        ) );

        $result = '<a href="/?' . $query . '">Übersicht Jahre</a>';
        return $result;
    }

    protected function htmlAktionListe(): string
    {
        $query = http_build_query ( array(
            Name::Task => Task::ShowTourenListe
        ) );

        $result = '<a href="/?' . $query . '">alle Touren</a>';
        return $result;
    }

    protected function htmlAktionSuche(): string
    {
        $query = http_build_query ( array(
            Name::Task => Task::Suche
        ) );

        $result = '<a href="/?' . $query . '">Suche</a>';
        return $result;
    }

    /**
     * @return string|null
     */
    abstract protected function htmlBody();
}

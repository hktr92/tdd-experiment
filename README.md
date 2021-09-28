# tdd-experiment

it all started with an interview task i found randomly on linkedin. i thought it would be nice to make it using phpunit
and as testable as possible.

the development time took 2 hours, with 30 mins being only the project setup for docker and some tools i wanted to use.

since i'm using php 8.1, it wasn't necessary due to early adoption of this version.

tdd is nice, mostly because i did the project without actually opening the web page.

## structure

- `app/` contains various app-related stuff:
  - `templates/` -> contains twig templates. it was easier than hooking my own templating
  - `services.php` -> a simple static container to register templating engine
- `public/` -> contains the index.php file that hooks up the whole page
- `src/` -> the source code
- `tests/` -> contains phpunit tests


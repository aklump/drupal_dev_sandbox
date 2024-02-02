<?php
declare(strict_types=1);

namespace Drupal\dev_sandbox\EventSubscriber;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class Sandbox implements EventSubscriberInterface {

  /**
   * @var \Symfony\Component\HttpFoundation\Request
   */
  private Request $request;

  private array $comments = [];

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events = [];

    // Best practice; use class_exists().
    // @link https://www.drupal.org/project/drupal/issues/2825358
    if (class_exists(KernelEvents::CLASS)) {
      $events[KernelEvents::CONTROLLER][] = ['handleSandbox', 100];
    }

    return $events;
  }

  /**
   * Handle rerouting to the sandbox file.
   *
   * @param ViewEvent $event
   *   A new event instance.
   */
  public function handleSandbox(ControllerEvent $event) {
    $this->request = $event->getRequest();
    if (!$this->isSandboxEnabled()) {
      return;
    }

    $this->comments = [];

    $sandbox_filepath = $this->getSandboxPath();
    $this->comments[] = "<!-- DEV SANDBOX DEBUG -->";

    // Handle ?theme={theme_name}
    $theme_name = $this->getSandboxTheme();
    if ($theme_name) {
      $this->trySetTheme($theme_name);
    }

    $this->comments[] = "<!-- BEGIN OUTPUT from '$sandbox_filepath' -->";
    echo implode(PHP_EOL, $this->comments) . PHP_EOL;

    $this->tryRequireSandbox($sandbox_filepath);
    exit;
  }

  private function isSandboxEnabled(): bool {
    return (bool) $this->request->get('sb');
  }

  private function getSandboxTheme(): string {
    return (string) $this->request->get('theme');
  }

  private function trySetTheme(string $theme_name): void {
    // We call this because it will throw an exception on invalid theme.
    \Drupal::service('theme_handler')->getTheme($theme_name);
    $active_theme = \Drupal::service('theme.initialization')
      ->initTheme($theme_name);
    \Drupal::theme()->setActiveTheme($active_theme);
    $this->comments[] = "<!-- ACTIVE THEME is '$theme_name' -->";
  }

  private function getSandboxPath(): string {
    return 'private://dev_sandbox.inc';
  }

  /**
   * Requires the sandbox file
   *
   * @param string $filepath The path of the file to be required.
   *
   * @throws \InvalidArgumentException If the file does not exist.
   */
  private function tryRequireSandbox(string $filepath): void {
    if (!file_exists($filepath)) {
      throw new \InvalidArgumentException(sprintf('dev_sandbox.include is defined as %s; that path does not exist.', $filepath));
    }
    require $filepath;
  }

}

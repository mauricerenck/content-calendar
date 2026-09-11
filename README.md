# Kirby Content Calendar

Transform your scheduled Kirby articles into a subscribable calendar feed.

![header](/assets/content-calendar.png)

- Plan Ahead – Transform your scheduled articles to a subscribable calendar
- Subscribe Easily – Works with Google Calendar, Apple Calendar & more
- No Sync Needed – Just copy the link and stay updated automatically
- Content Overview – Keep track of upcoming posts at a glance
- Stay Organized – Always know what’s scheduled to go live

## Installation

Use one of these methods to install the plugin:

- composer (recommended): `composer require mauricerenck/content-calendar`
- zip file: unzip [main.zip](https://github.com/mauricerenck/content-calendar/releases/latest) as folder `site/plugins/content-calendar`

## License

Kirby Calendar View can be used in a limited free mode. In order to use the full featured version, you'll have to purchase a valid Kirby license & a valid plugin license.

Due to the ownership transfer, new licenses are not available at the moment.

## Usage

First configure a secret in the `config.php` file:

```php
'mauricerenck.content-calendar' => [
    'secret' => 'YOUR-SECRET',
],
```

Then set your timezone:

```php
'mauricerenck.content-calendar' => [
    'secret' => 'YOUR-SECRET',
    'timezone' => 'Europe/Berlin',
],
```

Tell the plugin which pages contain your posts:

```php
'mauricerenck.content-calendar' => [
    'secret' => 'YOUR-SECRET',
    'timezone' => 'Europe/Berlin',
    'pages' => [
        'blog',
        'notes',
    ],
],
```

You can also use collections as a source:

```php
'mauricerenck.content-calendar' => [
    'secret' => 'YOUR-SECRET',
    'timezone' => 'Europe/Berlin',
    'collections' => [
        'blog',
        'notes',
    ],
],
```

Then subscribe to the calendar URL: `https://yourdomain.com/YOUR-SECRET/calendarview.ics`

## Options

Please prefix every option with `mauricerenck.content-calendar.`.

| Option             | Default           | Description                                                  |
| ------------------ | ----------------- | ------------------------------------------------------------ |
| `licenseKey`       | `''`              | Your license key                                             |
| `secret`           | `''`              | Your secret key                                              |
| `timezone`         | `'Europe/Berlin'` | Your local timezone                                          |
| `duration`         | `30`              | How long should the calendar entry be displayed (in minutes) |
| `pages`            | `[]`              | An array of pages where your posts are in                    |
| `collections`      | `[]`              | An array of collection of posts                              |
| `templates`        | `[]`              | Only show posts having a specific template                   |
| `titleField`       | page title        | Set a field to use as title                                  |
| `dateField`        | `date`            | Set a youd date field                                        |
| `descriptionField` | `''`              | Set a field to use as description                            |

Copyright 2026 © Maurice Renck

# invisiblerecaptcha


## Google invisible recaptcha for TYPO3 powermail to prevent spam

<img src="https://box.everhelper.me/attachment/810331/84725fb7-0b3e-4c40-b52e-29d7620777bb/262407-UNiMu2vk6hQoaBSp/screen.png" />


## Dependencies

* powermail >= 5.0
* TYPO3 >= 8.7 and < 10.0
* php >= 7.0


## Installation

- Just install this extension - e.g. `composer require in2code/invisiblerecaptcha` or download it and install it with the old way
- Clear caches
- Register your domain to www.google.com/recaptcha/
- Add sitekey and secretkey to TypoScript Constants (see example below)
- Replace your submit button with the new field type "Google Invisible Recaptcha"
- Have fun

Example for TypoScript Constants:

```
plugin.tx_invisiblerecaptcha.sitekey = 6LdsBBUTAAAAAKMhI67inzeAvzBh5JdRRxlCwbTz
plugin.tx_invisiblerecaptcha.secretkey = 6LdsBBUTAAAAAKMhaaaainzeAvzBh5JdRRxlCwbyy
```

## Notes and best practice

Be sure to have spamshield enabled in powermail (TypoScript setup):


```
plugin.tx_powermail.settings.setup.spamshield._enable = 1
```

Keep up to date if powermail recognize spam (TypoScript setup):

```
# Get an email if spam was recognized
plugin.tx_powermail.settings.setup.spamshield.email = alex@in2code.de

# Write to a logfile when spam was recognized
plugin.tx_powermail.settings.setup.spamshield.logfileLocation = typo3temp/logs/powermailSpam.log
```


## Changelog

| Version    | Date       | Description                                                                                                  |
| ---------- |:----------:| ------------------------------------------------------------------------------------------------------------:|
| 2.0.0      | 2018-01-31 | Update for powermail 5.x                                                                                     |
| 1.1.1      | 2017-11-10 | Replace hardcoded button title in template                                                                   |
| 1.1.0      | 2017-11-04 | Update dependencies for powermail 4.x                                                                        |
| 1.0.0      | 2017-03-13 | Initial upload - have fun                                                                                    |

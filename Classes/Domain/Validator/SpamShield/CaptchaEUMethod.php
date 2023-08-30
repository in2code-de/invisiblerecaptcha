<?php
declare(strict_types=1);
namespace CaptchaEU\Domain\Validator\SpamShield;

use In2code\Powermail\Domain\Model\Field;
use In2code\Powermail\Domain\Validator\SpamShield\AbstractMethod;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\Exception;

/**
 * Class CaptchaEUMethod
 */
class CaptchaEUMethod extends AbstractMethod
{
    /**
     * @var string
     */
    protected $restKey = '';

    /**
     * Check if secret key is given and set it
     *
     * @return void
     * @throws \Exception
     */
    public function initialize(): void
    {
        if ($this->isFormWithCaptchaEUField()) {
          
            if (empty($this->configuration['restkey']) || $this->configuration['restkey'] === 'abcdef') {
                throw new \LogicException(
                    'No restkey given. Please add a secret key to TypoScript Constants',
                    1607014176
                );
            }
            $this->restKey = $this->configuration['restkey'];
            
        }
    }

    public function checkSolution($solution) {
        $ch = curl_init("https://www.captcha.eu/validate");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $solution);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Rest-Key: ' . $this->restKey));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
  
        $resultObject = json_decode($result);
        if ($resultObject->success) {
          return true;
        } else {
          return false;
        }
      }
  

    /**
     * @return bool true if spam recognized
     * @throws Exception
     * @throws ExtensionConfigurationExtensionNotConfiguredException
     * @throws ExtensionConfigurationPathDoesNotExistException
     */
    public function spamCheck(): bool
    {
        
        if (!$this->isFormWithCaptchaEUField() || $this->isCaptchaCheckToSkip()) {
            return false;
        }
        $result = $this->checkSolution($_POST["captcha_at_solution"]);
        if(!$result) {
            return true;
        }
        return false;
    }

    /**
     * Check if current form has a recaptcha field
     *
     * @return bool
     * @throws ExtensionConfigurationExtensionNotConfiguredException
     * @throws ExtensionConfigurationPathDoesNotExistException
     * @throws Exception
     */
    protected function isFormWithCaptchaEUField(): bool
    {
        foreach ($this->mail->getForm()->getPages() as $page) {
            /** @var Field $field */
            foreach ($page->getFields() as $field) {
                if ($field->getType() === 'captchaeu') {
                    return true;
                }
            }
        }
        return false;
    }



    /**
     * Captcha check should be skipped on createAction if there was a confirmationAction where the captcha was
     * already checked before
     * Note: $this->flexForm is only available in powermail 3.9 or newer
     *
     * @return bool
     */
    protected function isCaptchaCheckToSkip(): bool
    {
        if (property_exists($this, 'flexForm')) {
            $confirmationActive = $this->flexForm['settings']['flexform']['main']['confirmation'] === '1';
            return $this->getActionName() === 'create' && $confirmationActive;
        }
        return false;
    }

    /**
     * @return string "confirmation" or "create"
     */
    protected function getActionName(): string
    {
        $pluginVariables = GeneralUtility::_GPmerged('tx_powermail_pi1');
        return $pluginVariables['action'];
    }
}

<?php
declare(strict_types=1);

namespace GeorgRinger\LoginLink\TCA;

use GeorgRinger\LoginLink\Repository\TokenRepository;
use GeorgRinger\LoginLink\Service\TokenGenerator;
use GeorgRinger\LoginLink\Service\Validation;
use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class LoginAsFormElement extends AbstractFormElement {
    public function render() {
        $result = $this->initializeResultArray();

        $row = $this->data['databaseRow'];

        $icon = $this->iconFactory->getIcon('txloginlink-loginlink', Icon::SIZE_SMALL);

        $uriBuilder = GeneralUtility::makeInstance(UriBuilder::class);
        $url = (string)$uriBuilder->buildUriFromRoute('loginlink_token', [
            'table' => 'fe_users',
            'id' => $row['uid'],
            'redirect' => 1,
        ]);

        $result['html'] = '<a href="' . $url . '" target="_blank" class="btn btn-default">' . $icon->render() . ' Login As ' . $row['username'] . '</a>';

        return $result;
    }
}

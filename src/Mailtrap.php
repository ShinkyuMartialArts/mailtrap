<?php

namespace ShinkyuMartialArts\Mailtrap;

use ShinkyuMartialArts\Mailtrap\Api\Api;
use ShinkyuMartialArts\Mailtrap\Entities\User;
use ShinkyuMartialArts\Mailtrap\Entities\Inbox;
use ShinkyuMartialArts\Mailtrap\Entities\Company;
use ShinkyuMartialArts\Mailtrap\Entities\Message;
use ShinkyuMartialArts\Mailtrap\Entities\InboxUser;
use ShinkyuMartialArts\Mailtrap\Entities\Attachment;
use ShinkyuMartialArts\Mailtrap\Entities\CorsDomain;
use ShinkyuMartialArts\Mailtrap\Entities\SharedUser;
use ShinkyuMartialArts\Mailtrap\Entities\ForwardRule;
use ShinkyuMartialArts\Mailtrap\Entities\SharedInbox;

class Mailtrap
{
    /**
     * @var Api
     */
    protected $api;

    /**
     * Mailtrap constructor.
     * @param string $token
     * @param string $version
     */
    public function __construct(string $token, string $version = 'v1')
    {
        $this->api = new Api($token, $version);
    }

    /**
     * Get Authenticated User
     * @see http://docs.mailtrap.apiary.io/#reference/user/apiv1user/get
     * @return User
     */
    public function getUser()
    {
        return new User($this->api->get('user'));
    }

    /**
     * Update Authenticated User
     * @see http://docs.mailtrap.apiary.io/#reference/user/apiv1user/patch
     * @param User $user
     * @return User
     */
    public function updateUser(User $user)
    {
        return new User($this->api->patch('user', [
            'user' => [
                'name' => $user->getName()
            ]
        ]));
    }

    /**
     * Companies list
     * @see http://docs.mailtrap.apiary.io/#reference/company/apiv1companies/get
     * @return Company[]
     */
    public function indexCompanies()
    {
        return Api::collection(Company::class, $this->api->get('companiesList'));
    }

    /**
     * Get a Company
     * @see http://docs.mailtrap.apiary.io/#reference/company/apiv1companiesid/get
     * @param string $id
     * @return Company
     */
    public function getCompany(string $id)
    {
        return new Company($this->api->get('company'), [
            'ids' => [
                'companyId' => $id
            ]
        ]);
    }

    /**
     * Update a Company
     * @see http://docs.mailtrap.apiary.io/#reference/company/apiv1companiesid/patch
     * @param Company $company
     * @return Company
     */
    public function updateCompany(Company $company)
    {
        return new Company($this->api->patch('company', [
            'company' => [
                'name' => $company->getName()
            ]
        ]));
    }

    /**
     * Delete a Company
     * @see http://docs.mailtrap.apiary.io/#reference/company/apiv1companiesid/delete
     * @param Company $company
     * @return bool
     */
    public function deleteCompany(Company $company)
    {
        return $this->api->delete('company', [
            'ids' => [
                'companyId' => $company->getId()
            ]
        ]);
    }

    /**
     * Create an Inbox
     * @see http://docs.mailtrap.apiary.io/#reference/company/apiv1companiesidinboxes/post
     * @param Company $company
     * @param Inbox $inbox
     * @return array
     */
    public function createInbox(Company $company, Inbox $inbox)
    {
        return $this->api->post(
            'companyInbox',
            [
                'inbox' => [
                    'name' => $inbox->getName()
                ]
            ],
            [
                'ids' => [
                    'companyId' => $company->getId()
                ]
            ]
        );
    }

    /**
     * Inbox list
     * @see http://docs.mailtrap.apiary.io/#reference/inbox/apiv1inboxes/get
     * @return Inbox[]
     */
    public function indexInboxes()
    {
        return Api::collection(Inbox::class, $this->api->get('inboxesList'));
    }

    /**
     * Get an Inbox
     * @see http://docs.mailtrap.apiary.io/#reference/inbox/apiv1inboxesid/get
     * @param string $id
     * @return Inbox
     */
    public function getInbox(string $id)
    {
        return new Inbox($this->api->get('inbox', [
            'ids' => [
                'inboxId' => $id
            ]
        ]));
    }

    /**
     * Update an Inbox
     * @see http://docs.mailtrap.apiary.io/#reference/inbox/apiv1inboxesid/patch
     * @param Inbox $inbox
     * @return Inbox
     */
    public function updateInbox(Inbox $inbox)
    {
        return new Inbox($this->api->patch(
            'inbox',
            [
                'inbox' => [
                    'name' => $inbox->getName(),
                    'email_username' => $inbox->getEmailUsername()
                ]
            ],
            [
                'ids' => [
                    'inboxId' => $inbox->getId()
                ]
            ]
        ));
    }

    /**
     * Delete an Inbox
     * @see http://docs.mailtrap.apiary.io/#reference/inbox/apiv1inboxesid/delete
     * @param Inbox $inbox
     * @return bool
     */
    public function deleteInbox(Inbox $inbox)
    {
        return $this->api->delete('inbox', [
            'ids' => [
                'inboxId' => $inbox->getId()
            ]
        ]);
    }

    /**
     * Clean all messages from an Inbox
     * @see http://docs.mailtrap.apiary.io/#reference/inbox/apiv1inboxesinboxidclean/patch
     * @param Inbox $inbox
     * @return Inbox
     */
    public function cleanInbox(Inbox $inbox)
    {
        return new Inbox($this->api->patch('clean', [], [
            'ids' => [
                'inboxId' => $inbox->getId()
            ]
        ]));
    }

    /**
     * Mark all messages in an Inbox
     * @see http://docs.mailtrap.apiary.io/#reference/inbox/apiv1inboxesinboxidallread/patch
     * @param Inbox $inbox
     * @return Inbox
     */
    public function markAllRead(Inbox $inbox)
    {
        return new Inbox($this->api->patch('allRead', [], [
            'ids' => [
                'inboxId' => $inbox->getId()
            ]
        ]));
    }

    /**
     * Reset credentials of an Inbox
     * @see http://docs.mailtrap.apiary.io/#reference/inbox/apiv1inboxesinboxidresetcredentials/patch
     * @param Inbox $inbox
     * @return Inbox
     */
    public function resetCredentials(Inbox $inbox)
    {
        return new Inbox($this->api->patch('resetCredentials', [], [
            'ids' => [
                'inboxId' => $inbox->getId()
            ]
        ]));
    }

    /**
     * Reset Inbox email address
     * @see http://docs.mailtrap.apiary.io/#reference/inbox/apiv1inboxesinboxidresetemailusername/patch
     * @param Inbox $inbox
     * @return Inbox
     */
    public function resetEmailUsername(Inbox $inbox)
    {
        return new Inbox($this->api->patch('resetEmailUsername', [], [
            'ids' => [
                'inboxId' => $inbox->getId()
            ]
        ]));
    }

    /**
     * Enable/disable accept by Inbox emails from emails address
     * @see http://docs.mailtrap.apiary.io/#reference/inbox/apiv1inboxesinboxidtoggleemailusername/patch
     * @param Inbox $inbox
     * @return Inbox
     */
    public function toggleEmailUsername(Inbox $inbox)
    {
        return new Inbox($this->api->patch('toggleEmailUsername', [], [
            'ids' => [
                'inboxId' => $inbox->getId()
            ]
        ]));
    }

    /**
     * Shared Inbox list
     * @see http://docs.mailtrap.apiary.io/#reference/shared-inbox/apiv1sharedinboxes/get
     * @return SharedInbox[]
     */
    public function indexSharedInboxes()
    {
        return Api::collection(SharedInbox::class, $this->api->get('sharedInboxesList'));
    }

    /**
     * Delete a Shared Inbox
     * @see http://docs.mailtrap.apiary.io/#reference/shared-inbox/delete
     * @param SharedInbox $sharedInbox
     * @return bool
     */
    public function deleteSharedInbox(SharedInbox $sharedInbox)
    {
        return $this->api->delete('sharedInbox', [
            'ids' => [
                'sharedInboxId' => $sharedInbox->getId()
            ]
        ]);
    }

    /**
     * Inbox message list
     * @see http://docs.mailtrap.apiary.io/#reference/message/apiv1inboxesinboxidmessagessearchpagelastid/get
     * @param Inbox $inbox
     * @param array $params
     * @return Message[]
     */
    public function indexMessages(Inbox $inbox, array $params = [])
    {
        return Api::collection(Message::class, $this->api->get('messagesList', array_merge(
            $params,
            [
                'ids' => [
                    'inboxId' => $inbox->getId()
                ]
            ]
        )));
    }

    /**
     * Get a message from an Inbox
     * @see http://docs.mailtrap.apiary.io/#reference/message/apiv1inboxesinboxidmessagesid
     * @param Inbox $inbox
     * @param string $id
     * @return Message
     */
    public function getMessage(Inbox $inbox, string $id)
    {
        return new Message($this->api->get('message', [
            'ids' => [
                'inboxId' => $inbox->getId(),
                'messageId' => $id
            ]
        ]));
    }

    /**
     * Update a message
     * @see http://docs.mailtrap.apiary.io/#reference/message/apiv1inboxesinboxidmessagesid/patch
     * @param Message $message
     * @return Message
     */
    public function updateMessage(Message $message)
    {
        return new Message($this->api->patch(
            'message',
            [
                'message' => [
                    'is_read' => $message->getIsRead()
                ]
            ],
            [
                'ids' => [
                    'inboxId' => $message->getInboxId(),
                    'messageId' => $message->getId()
                ]
            ]
        ));
    }

    /**
     * Delete a message
     * @see http://docs.mailtrap.apiary.io/#reference/message/apiv1inboxesinboxidmessagesid/delete
     * @param Message $message
     * @return bool
     */
    public function deleteMessage(Message $message)
    {
        return $this->api->delete('message', [
            'ids' => [
                'inboxId' => $message->getInboxId(),
                'messageId' => $message->getId()
            ]
        ]);
    }

    /**
     * Forward a Message to email address
     * @see http://docs.mailtrap.apiary.io/#reference/message/apiv1inboxesinboxidmessagesidforward/post
     * @param Message $message
     * @param string $forwardEmailAddress
     * @return array
     */
    public function forwardMessage(Message $message, string $forwardEmailAddress)
    {
        return $this->api->post(
            'forwardMessage',
            [
                'email' => $forwardEmailAddress
            ],
            [
                'ids' => [
                    'inboxId' => $message->getInboxId(),
                    'messageId' => $message->getId()
                ]
            ]
        );
    }

    /**
     * Get HTML email body from a Message
     * @see http://docs.mailtrap.apiary.io/#reference/message/apiv1inboxesinboxidmessagesidbodyhtml/get
     * @see http://docs.mailtrap.apiary.io/#reference/message/apiv1inboxesinboxidmessagesidbodytxt/get
     * @see http://docs.mailtrap.apiary.io/#reference/message/apiv1inboxesinboxidmessagesidbodyraw/get
     * @see http://docs.mailtrap.apiary.io/#reference/message/apiv1inboxesinboxidmessagesidbodyeml/get
     * @param Message $message
     * @param string $format
     * @return array
     */
    public function getMessageBody(Message $message, string $format = 'html')
    {
        return $this->api->get('messageBody'.ucfirst(strtolower($format)), [
            'ids' => [
                'inboxId' => $message->getInboxId(),
                'messageId' => $message->getId()
            ]
        ]);
    }

    /**
     * Get email headers from a Message
     * @see http://docs.mailtrap.apiary.io/#reference/message/apiv1inboxesinboxidmessagesidmailheaders/get
     * @param Message $message
     * @return array
     */
    public function getMessageHeaders(Message $message)
    {
        return $this->api->get('messageMailHeaders', [
            'ids' => [
                'inboxId' => $message->getInboxId(),
                'messageId' => $message->getId()
            ]
        ]);
    }

    /**
     * Get spam report for a Message
     * @see http://docs.mailtrap.apiary.io/#reference/message/apiv1inboxesinboxidmessagesidspamreport/get
     * @param Message $message
     * @return array
     */
    public function getMessageSpamReport(Message $message)
    {
        return $this->api->get('messageSpamReport', [
            'ids' => [
                'inboxId' => $message->getInboxId(),
                'messageId' => $message->getId()
            ]
        ]);
    }

    /**
     * Get info about HTML part of a Message
     * @see http://docs.mailtrap.apiary.io/#reference/message/apiv1inboxesinboxidmessagesidanalyze/get
     * @param Message $message
     * @return array
     */
    public function getMessageHtmlInfo(Message $message)
    {
        return $this->api->get('messageAnalyze', [
            'ids' => [
                'inboxId' => $message->getInboxId(),
                'messageId' => $message->getId()
            ]
        ]);
    }

    /**
     * Message Attachments list
     * @see http://docs.mailtrap.apiary.io/#reference/attachment/apiv1inboxesinboxidmessagesmessageidattachmentsattachmenttype/get
     * @param Message $message
     * @return Attachment[]
     */
    public function indexAttachments(Message $message)
    {
        return Api::collection(
            Attachment::class,
            $this->api->get('messageAttachmentsList',
            [
                'ids' => [
                    'inboxId' => $message->getInboxId(),
                    'messageId' => $message->getId()
                ]
            ]
        ));
    }

    /**
     * Get a Message Attachment
     * @see http://docs.mailtrap.apiary.io/#reference/attachment/apiv1inboxesinboxidmessagesmessageidattachmentsid/get
     * @param Message $message
     * @param string $id
     * @return Attachment
     */
    public function getAttachment(Message $message, string $id)
    {
        return new Attachment($this->api->get('messageAttachment', [
            'ids' => [
                'inboxId' => $message->getInboxId(),
                'messageId' => $message->getId(),
                'attachmentId' => $id
            ]
        ]));
    }

    /**
     * List Forward Rules of an Inbox
     * @see http://docs.mailtrap.apiary.io/#reference/forward-rules/apiv1inboxesinboxidforwardrules/get
     * @param Inbox $inbox
     * @return ForwardRule[]
     */
    public function indexForwardRules(Inbox $inbox)
    {
        return Api::collection(ForwardRule::class, $this->api->get('messageForwardRules', [
            'ids' => [
                'inboxId' => $inbox->getId()
            ]
        ]));
    }

    /**
     * Create a Forward Rule for an Inbox
     * @see http://docs.mailtrap.apiary.io/#reference/forward-rules/apiv1inboxesinboxidforwardrules/post
     * @param Inbox $inbox
     * @param ForwardRule $forwardRule
     * @return ForwardRule
     */
    public function createForwardRule(Inbox $inbox, ForwardRule $forwardRule)
    {
        return new ForwardRule($this->api->post(
            'messageForwardRules',
            [
                'forward_rule' => [
                    'forward_type' => $forwardRule->getForwardType(),
                    'forward_value' => $forwardRule->getForwardValue()
                ]
            ],
            [
                'ids' => [
                    'inboxId' => $inbox->getId()
                ]
            ]
        ));
    }

    /**
     * Get a Forward Rule
     * @see http://docs.mailtrap.apiary.io/#reference/forward-rules/apiv1inboxesinboxidforwardrulesid/get
     * @param Inbox $inbox
     * @param string $id
     * @return ForwardRule
     */
    public function getForwardRule(Inbox $inbox, string $id)
    {
        return new ForwardRule($this->api->get('messageForwardRule', [
            'ids' => [
                'inboxId' => $inbox->getId(),
                'forwardRuleId' => $id
            ]
        ]));
    }

    /**
     * Update a Forward Rule
     * @see http://docs.mailtrap.apiary.io/#reference/forward-rules/apiv1inboxesinboxidforwardrulesid/patch
     * @param ForwardRule $forwardRule
     * @return ForwardRule
     */
    public function updateForwardRule(ForwardRule $forwardRule)
    {
        return new ForwardRule($this->api->patch(
            'messageForwardRule',
            [
                'forward_rule' => [
                    'forward_type' => $forwardRule->getForwardType(),
                    'forward_value' => $forwardRule->getForwardValue()
                ]
            ],
            [
                'ids' => [
                    'inboxId' => $forwardRule->getInboxId(),
                    'forwardRuleId' => $forwardRule->getId()
                ]
            ]
        ));
    }

    /**
     * Delete a Forward Rule
     * @see http://docs.mailtrap.apiary.io/#reference/forward-rules/apiv1inboxesinboxidforwardrulesid/delete
     * @param ForwardRule $forwardRule
     * @return bool
     */
    public function deleteForwardRule(ForwardRule $forwardRule)
    {
        return $this->api->delete('messageForwardRule', [
            'ids' => [
                'inboxId' => $forwardRule->getInboxId(),
                'forwardRuleId' => $forwardRule->getId()
            ]
        ]);
    }

    /**
     * List Inbox Users
     * @see http://docs.mailtrap.apiary.io/#reference/inbox-user/apiv1inboxesinboxidinboxesusers/get
     * @param Inbox $inbox
     * @return InboxUser[]
     */
    public function indexInboxUsers(Inbox $inbox)
    {
        return Api::collection(InboxUser::class, $this->api->get('inboxUsersList', [
            'ids' => [
                'inboxId' => $inbox->getId()
            ]
        ]));
    }

    /**
     * Get an Inbox User
     * @see http://docs.mailtrap.apiary.io/#reference/inbox-user/apiv1inboxesinboxidinboxesusersid/get
     * @param Inbox $inbox
     * @param string $id
     * @return InboxUser
     */
    public function getInboxUser(Inbox $inbox, string $id)
    {
        return new InboxUser($this->api->get('inboxUser', [
            'ids' => [
                'inboxId' => $inbox->getId(),
                'inboxUserId' => $id
            ]
        ]));
    }

    /**
     * Delete Inbox User
     * @see http://docs.mailtrap.apiary.io/#reference/inbox-user/apiv1inboxesinboxidinboxesusersid/delete
     * @param InboxUser $inboxUser
     * @return bool
     */
    public function deleteInboxUser(InboxUser $inboxUser)
    {
        return $this->api->delete('inboxUser', [
            'ids' => [
                'inboxId' => $inboxUser->getInboxId(),
                'inboxUserId' => $inboxUser->getId()
            ]
        ]);
    }

    /**
     * Cors Domain list
     * @see http://docs.mailtrap.apiary.io/#reference/cors-domain/apiv1corsdomainsid/get
     * @return array
     */
    public function indexCorsDomains()
    {
        return Api::collection(CorsDomain::class, $this->api->get('corsDomains'));
    }

    /**
     * Get a Cors Domain
     * @see http://docs.mailtrap.apiary.io/#reference/cors-domain/apiv1corsdomainsid/get
     * @param string $id
     * @return CorsDomain
     */
    public function getCorsDomain(string $id)
    {
        return new CorsDomain($this->api->get('corsDomain', [
            'ids' => [
                'corsDomainId' => $id
            ]
        ]));
    }

    /**
     * Create a Cors Domain
     * @see http://docs.mailtrap.apiary.io/#reference/cors-domain/apiv1corsdomainsid/post
     * @param CorsDomain $corsDomain
     * @return CorsDomain
     */
    public function createCorsDomain(CorsDomain $corsDomain)
    {
        return new CorsDomain($this->api->post( 'corsDomains', [
            'cors_domain' => [
                'domain' => $corsDomain->getDomain()
            ]
        ]));
    }

    /**
     * Update a Cors Domain
     * @see http://docs.mailtrap.apiary.io/#reference/cors-domain/apiv1corsdomainsid/patch
     * @param CorsDomain $corsDomain
     * @return CorsDomain
     */
    public function updateCorsDomain(CorsDomain $corsDomain)
    {
        return new CorsDomain($this->api->patch( 'corsDomain', [
            'cors_domain' => [
                'domain' => $corsDomain->getDomain()
            ],
            [
                'ids' => [
                    'corsDomainId' => $corsDomain->getId()
                ]
            ]
        ]));
    }

    /**
     * Delete a Cors Domain
     * @see http://docs.mailtrap.apiary.io/#reference/cors-domain/apiv1corsdomainsid/delete
     * @param CorsDomain $corsDomain
     * @return bool
     */
    public function deleteCorsDomain(CorsDomain $corsDomain)
    {
        return $this->api->delete('corsDomain', [
            'ids' => [
                'corsDomainId' => $corsDomain->getId()
            ]
        ]);
    }

    /**
     * Shared Users List
     * @see http://docs.mailtrap.apiary.io/#reference/cors-domain/apiv1corsdomainsid/get
     * @param Company $company
     * @return array
     */
    public function indexSharedUsers(Company $company)
    {
        return Api::collection(SharedUser::class, $this->api->get('sharedUsersList', [
            'ids' => [
                'companyId' => $company->getId()
            ]
        ]));
    }

    /**
     * Get a Shared User
     * @see http://docs.mailtrap.apiary.io/#reference/shared-user/apiv1companiescompanyidsharedusersid/get
     * @param Company $company
     * @param string $id
     * @return SharedUser
     */
    public function getSharedUser(Company $company, string $id)
    {
        return new SharedUser($this->api->get('sharedUser', [
            'ids' => [
                'companyId' => $company->getId(),
                'sharedUserId' => $id
            ]
        ]));
    }

    /**
     * Delete a Shared User
     * @see http://docs.mailtrap.apiary.io/#reference/shared-user/apiv1companiescompanyidsharedusersid/delete
     * @param Company $company
     * @param SharedUser $sharedUser
     * @return bool
     */
    public function deleteSharedUser(Company $company, SharedUser $sharedUser)
    {
        return $this->api->delete('sharedUser', [
            'ids' => [
                'companyId' => $company->getId(),
                'sharedUserId' => $sharedUser->getId()
            ]
        ]);
    }

    /**
     * Reset Api Token
     * @ee http://docs.mailtrap.apiary.io/#reference/user/apiv1userresetapitoken/get
     * @return string
     */
    public function resetApiToken()
    {
        $user = new User($this->api->patch('resetApiToken'));
        return $user->getApiToken();
    }

}

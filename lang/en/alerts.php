<?php

return [
    'no_changes' => 'No changes have been detected. No data was updated',
    'error' => 'Error: ',

    'email_notconfirmed' => 'Your email is not confirmed. Please check your inbox to verify. Not verified accounts will autoremove after 30 days.',
    'create_user_email_info' => 'Saving this will result with sending login details to the given email address.',
    'not_authorized' => 'You are not authorized!',
    'not_authorized_text' => 'Your credentials are not sufficient to perfom this action.',

    'datatables_nodata' => "There's no data to be shown here.",


    'success' => [
        // MODEL OPERATIONS
        'model_edited' => ':model has been successfuly edited.',
        'model_created' => ':model has been successfuly created.',
        'model_deleted' => ':model has been successfuly deleted.',
        'model_blocked' => ':model has been blocked. From now it will be impossible to log in to the system from this account.',
        'model_unblocked' => ':model has been unlocked. Logging in to the system is possible again.',
        'model_watched' => ':model is now being watched. You will receive additional notifications regarding its activity in the system.',
        'model_unwatched' => ':model is not longer being watched. You will not receive any extra notifications from now on.',
        'model_note' => 'You successfully saved a note about :model.',

        // SETTINGS
        'settings_modules' => 'Modules have been successfuly updated.',


        'savingcolumns' => 'Your columns have been saved and will be remembered for future logins.',

    ],

    'error' => [
        'model_edited' => ':model could not been edited. You may be lacking some permissions to complete this action. Contact with Your administrator',
        'model_created' => ':model could not been created. You may be lacking some permissions to complete this action. Contact with Your administrator',
        'model_deleted' => ':model could not been deleted. You may be lacking some permissions to complete this action. Contact with Your administrator',
        'model_blocked' => ':model could not be blocked. You may be lacking some permissions to complete this action. Contact with Your administrator',
        'model_unblocked' => ':model could not be unlocked. You may be lacking some permissions to complete this action. Contact with Your administrator',
        'model_watched' => 'You are already watching :model.',
        'model_unwatched' => ':model could not be be unwatched. You may not even been observing him at all.',
        'model_note' => 'Note could not be saved.',

        'savingcolumns' => 'Something went wrong during template saving. Columns will not be remembered',
    ],

    'info' => [

    ],

    'warning' => [

    ],
];
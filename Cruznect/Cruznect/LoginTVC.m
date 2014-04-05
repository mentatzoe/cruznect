//
//  LoginTVC.m
//  Cruznect
//
//  Created by Bruce•D•Su on 4/5/14.
//  Copyright (c) 2014 Cruznect. All rights reserved.
//

#import "LoginTVC.h"

@interface LoginTVC ()
@property (weak, nonatomic) IBOutlet UITextField *usernameTextField;
@property (weak, nonatomic) IBOutlet UITextField *passwordTextField;
@property (strong, nonatomic) UIAlertView *loginErrorAlertView;
@end

@implementation LoginTVC

NSString * const kLoginScriptURLString = @"";

- (BOOL)executeRequestWithRequestBody:(NSString *)requestBody
{
    NSURL *reqeustURL = [NSURL URLWithString:kLoginScriptURLString];
    const char *requestBodyStr = [requestBody UTF8String];
    NSData *requestData = [NSData dataWithBytes:requestBodyStr length:strlen(requestBodyStr)];
    
    NSMutableURLRequest *request = [NSMutableURLRequest requestWithURL:reqeustURL];
    [request setHTTPMethod:@"POST"];
    [request setHTTPBody:requestData];
    
    NSData *data = [NSURLConnection sendSynchronousRequest:request returningResponse:NULL error:NULL];
    
    NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	
    NSDictionary *results = data ? [NSJSONSerialization JSONObjectWithData:data options:NSJSONReadingMutableContainers|NSJSONReadingMutableLeaves error:nil] : nil;
    
    if ([[results objectForKey:@"status-code"] isEqual:[NSNumber numberWithInt:200]]) {
        [defaults setObject:@"YES" forKey:@"login"];
        return YES;
    } else {
        return NO;
    }
}

NSString * const kLoginErrorAlertTitle = @"Login Error";
NSString * const kLoginErrorAlertMessage = @"Check you username and password";

- (UIAlertView *)loginErrorAlertView
{
    if (!_loginErrorAlertView) {
        _loginErrorAlertView = [[UIAlertView alloc] initWithTitle:kLoginErrorAlertTitle
														  message:kLoginErrorAlertMessage
														 delegate:self
												cancelButtonTitle:@"Done"
												otherButtonTitles:nil];
    }
    return _loginErrorAlertView;
}

- (IBAction)loginButtonPressed:(id)sender
{
	NSString *usernameString = self.usernameTextField.text;
	NSString *passwordString = self.passwordTextField.text;
	
	NSString *requestBody = [NSString stringWithFormat:@"username=%@&password=%@", usernameString, passwordString];
    
	UIActivityIndicatorView *spinner = [[UIActivityIndicatorView alloc] initWithActivityIndicatorStyle:UIActivityIndicatorViewStyleWhite];
    [spinner startAnimating];
    self.navigationItem.rightBarButtonItem = [[UIBarButtonItem alloc] initWithCustomView:spinner];
    
    dispatch_queue_t verifyQ = dispatch_queue_create("Cruznect Verify", NULL);
    dispatch_async(verifyQ, ^{
        BOOL login = [self executeRequestWithRequestBody:requestBody];
		
		login = YES;
		
        dispatch_async(dispatch_get_main_queue(), ^{
            if (login) {
                self.navigationItem.rightBarButtonItem =
				[[UIBarButtonItem alloc] initWithTitle:@"Succeed!"
												 style:UIBarButtonItemStyleBordered
												target:nil
												action:nil];
				[self.delegate loginSucceedWithUsername:usernameString
											andPassword:passwordString];
            } else {
				self.navigationItem.rightBarButtonItem = sender;
                [self.loginErrorAlertView show];
            }
        });
    });
}

@end
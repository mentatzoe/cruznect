//
//  LoginViewController.m
//  Cruznect
//
//  Created by Bruce•D•Su on 4/5/14.
//  Copyright (c) 2014 Cruznect. All rights reserved.
//

#import "LoginViewController.h"

@interface LoginViewController ()
@property (weak, nonatomic) IBOutlet UITextField *usernameTextField;
@property (weak, nonatomic) IBOutlet UITextField *passwordTextField;
@property (strong, nonatomic) UIAlertView *loginErrorAlertView;
@end

@implementation LoginViewController

- (BOOL)executeRequestWithRequestBody:(NSString *)requestBody
{
    NSURL *reqeustURL = [NSURL URLWithString:@"http://airpkuhigh.pkuschool.edu.cn/ver0.2/scripts/?action_type=user&action=LClogin"];
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

- (void)presentLoginErrorAlert
{
	[self.loginErrorAlertView show];
}

- (IBAction)loginButtonPressed:(id)sender
{
	NSString *usernameString = self.usernameTextField.text;
	NSString *passwordString = self.passwordTextField.text;
	
	NSString *requestBody = [NSString stringWithFormat:@"username=%@&password=%@", usernameString, passwordString];
    BOOL login = [self executeRequestWithRequestBody:requestBody];
	if (login) {
		// Save username and password
		NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
		[defaults setObject:usernameString forKey:@"name"];
		[defaults setObject:passwordString forKey:@"schoolID"];
		
		// Perform Segue
		[self performSegueWithIdentifier:@"Login" sender:self];
	} else {
		[self presentLoginErrorAlert];
	}
}

@end

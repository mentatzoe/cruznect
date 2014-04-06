//
//  RootTabBarController.m
//  Cruznect
//
//  Created by Bruce•D•Su on 4/5/14.
//  Copyright (c) 2014 Cruznect. All rights reserved.
//

#import "RootTabBarController.h"
#import "LoginTVC.h"

@interface RootTabBarController () <LoginTVCDelegate>

@end

@implementation RootTabBarController

- (void)viewDidAppear:(BOOL)animated
{
	[super viewDidAppear:animated];
	
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	BOOL login = [[defaults objectForKey:@"login"] boolValue];
	if (!login) {
		UINavigationController *loginNav = [[UIStoryboard storyboardWithName:@"Main" bundle:nil] instantiateViewControllerWithIdentifier:@"LoginNC"];
		LoginTVC *loginTVC = (LoginTVC *)[loginNav topViewController];
		[loginTVC setDelegate:self];
		
		[self presentViewController:loginNav animated:YES completion:nil];
	}
}

#pragma mark - LoginTVCDelegate

- (void)loginSucceedWithEmail:(NSString *)email
					 password:(NSString *)password
					andUserID:(NSString *)userID
{
	NSUserDefaults *defaults = [NSUserDefaults standardUserDefaults];
	
	// Set login to yes
	[defaults setObject:[NSNumber numberWithBool:YES] forKey:@"login"];
	
	// Save email and password
	[defaults setObject:email forKey:@"email"];
	[defaults setObject:password forKey:@"password"];
	[defaults setObject:userID forKey:@"userID"];
	
	// Dismiss login table view controller
	[self dismissViewControllerAnimated:YES completion:nil];
}

@end

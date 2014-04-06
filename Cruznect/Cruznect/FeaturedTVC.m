//
//  FeaturedTVC.m
//  Cruznect
//
//  Created by Bruce•D•Su on 4/5/14.
//  Copyright (c) 2014 Cruznect. All rights reserved.
//

#import "FeaturedTVC.h"

@interface FeaturedTVC ()

@end

@implementation FeaturedTVC

- (void)refresh
{
    [self.refreshControl beginRefreshing];
    dispatch_queue_t fetchQ = dispatch_queue_create("Cruznect Fetch", NULL);
    dispatch_async(fetchQ, ^{
        self.projects =
		[CruznectRequest fetchFeaturedProjectsWithUserID:[[NSUserDefaults standardUserDefaults]
														  objectForKey:@"userID"]];
		dispatch_async(dispatch_get_main_queue(), ^{
			[self.tableView reloadData];
			[self.refreshControl endRefreshing];
		});
    });
}

- (void)viewDidLoad
{
    [super viewDidLoad];
    
	[self.refreshControl addTarget:self
                            action:@selector(refresh)
                  forControlEvents:UIControlEventValueChanged];
	if ([[NSUserDefaults standardUserDefaults] objectForKey:@"login"]) {
		[self refresh];
	}
}

@end
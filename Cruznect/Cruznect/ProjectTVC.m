//
//  ProjectTVC.m
//  Cruznect
//
//  Created by Bruce•D•Su on 4/5/14.
//  Copyright (c) 2014 Cruznect. All rights reserved.
//

#import "ProjectTVC.h"
#import "CruznectRequest.h"

#define NUMBER_OF_SECTIONS 4
#define LOGO_AND_TITLE 0
#define DETAILS 1
#define REQUIREMENTS 2
#define OWNER 3

@interface ProjectTVC ()
@property (strong, nonatomic) NSArray *requirements;
@end

@implementation ProjectTVC

- (void)refresh
{
	NSString *projectID = [self.project objectForKey:PROJECT_ID];
	[self.refreshControl beginRefreshing];
	dispatch_queue_t fetchQ = dispatch_queue_create("Cruznect Fetch", NULL);
    dispatch_async(fetchQ, ^{
        self.requirements = [CruznectRequest fetchProjectRequirementsWithProjectID:projectID];
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
    [self refresh];
}

#pragma mark - Table view data source

- (NSInteger)numberOfSectionsInTableView:(UITableView *)tableView
{
    return NUMBER_OF_SECTIONS;
}

- (NSInteger)tableView:(UITableView *)tableView numberOfRowsInSection:(NSInteger)section
{
	switch (section) {
		case LOGO_AND_TITLE:
			return 1;
			break;
		case DETAILS:
			return 2;
			break;
		case REQUIREMENTS:
//			return [self.requirements count];
			return 1;
			break;
		case OWNER:
			return 2;
			break;
		default:
			break;
	}
	return 0;
}

@end
